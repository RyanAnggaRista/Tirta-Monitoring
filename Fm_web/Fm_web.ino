#include <ESP8266WiFi.h>
#define SENSOR  4
#define BUZZER 5

// bagian wifi
const char *ssid = "Iphone ryan"; //ganti nama wifi
const char *pass = "akuryan10"; //ganti password
const char *host = "192.168.43.97"; //IP Address Server yang terpasang XAMPP

WiFiClient client;

long currentMillis = 0;
long previousMillis = 0;
int interval = 1000;

// bagian flowrate
// bagian awal 7.1
// bagian akhir 7.0
float calibrationFactor = 7.1;
float n;
volatile byte pulseCount;
byte pulse1Sec = 0;
float flowRate;

// bagian total
float flowMilliLitres;
float totalMilliLitres;

// bagian kecepatan
float konversi;
float kecepatan;
float A;
float s;

void IRAM_ATTR pulseCounter()
{
  pulseCount++;
}

void setup()
{
  Serial.begin(115200);
  Serial.print(" Menghubungkan ke : ");
  Serial.println(ssid);
  WiFi.begin(ssid, pass);
  pinMode(SENSOR, INPUT_PULLUP);
  pinMode(BUZZER, OUTPUT);

  // bagian flowrate
  pulseCount = 0;
  previousMillis = 0.0;
  flowRate = 0.0;
  n = 0.0;
  // bagian total
  flowMilliLitres = 0.0;
  totalMilliLitres = 0.0;
  // bagian kecepatan
  konversi = 0.0;
  kecepatan = 0.0;
  s = 60.0;
  A = 0.00037994;

  attachInterrupt(digitalPinToInterrupt(SENSOR), pulseCounter, FALLING);
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(1000);
    Serial.print("…");
  }

  Serial.print("\n");
  Serial.print("IP address : ");
  Serial.print(WiFi.localIP());
  Serial.print("\n");
  Serial.print("MAC : ");
  Serial.println(WiFi.macAddress());
  Serial.println("");
  Serial.print("Terhubung dengan : ");
  Serial.println(ssid);

  for (int i = 0; i <= 3; i++) {
    digitalWrite(BUZZER, HIGH);
    delay(200);
    digitalWrite(BUZZER, LOW);
    delay(200);
  }

  digitalWrite(BUZZER, LOW);
}

void loop() {

  // Membaca Sensor -------------------------------------------------------
  currentMillis = millis();
  if (currentMillis - previousMillis > interval) {

    // flowrate
    pulse1Sec = pulseCount;
    pulseCount = 0;
    n = ((1000.0 / (millis() - previousMillis)) * pulse1Sec);
    flowRate = n / calibrationFactor;
    // total
    flowMilliLitres = (flowRate / 60) * 1000;
    totalMilliLitres += flowMilliLitres;
    totalMilliLitres = totalMilliLitres / 1000;
    // kecepatan
    konversi = (flowRate / 1000) / s;
    kecepatan = konversi / A;

    previousMillis = millis();

    //float data1 = random(90.00, 100.00);
    //float data2 = random(90.00, 100.00);
    //float data3 = random(90.00, 100.00);

    // Print the flow rate for this second in litres / minute
    Serial.print("FlowRate: ");
    Serial.print(flowRate);
    Serial.print(" L/min");
    Serial.print("\t"); // Print tab space

    Serial.print("Total: ");
    Serial.print(totalMilliLitres);
    Serial.print(" L");

    Serial.print("\t"); // Print tab space
    Serial.print("Kecepatan: ");
    Serial.print(kecepatan);
    Serial.println(" m/s");


    Serial.print("connecting to ");
    Serial.println(host);

    // Mengirimkan ke alamat host dengan port 80 -----------------------------------
    WiFiClient client;
    const int httpPort = 80;

    if (!client.connect(host, httpPort)) {
      Serial.println("connection failed");
      return;
    }

    // Isi Konten yang dikirim adalah alamat ip si esp -----------------------------
    String url;
    url = "/website/write-sensor13.php?flowrateSensor13=";
    url += flowRate;
    url += "&volumeSensor13=";
    url += totalMilliLitres;
    url += "&kecepatanSensor13=";
    url += kecepatan;

    Serial.print("Requesting URL: ");
    Serial.println(url);

    // Mengirimkan Request ke Server -----------------------------------------------
    client.print(String("GET ") + url + " HTTP/1.1\r\n" +
                 "Host: " + host + "\r\n" +
                 "Connection: close\r\n\r\n");
  }
}
