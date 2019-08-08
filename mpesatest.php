<?php
$url = "http://192.168.9.48:8310/mminterface/request/";
$xml_data = '
<soapenv:Envelope 
xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" 
xmlns:req='.$url.'>
<soapenv:Header>
<tns:RequestSOAPHeader xmlns:tns="http://www.huawei.com.cn/schema/common/v2_1">
<tns:spId>107031</tns:spId> 
//SPid, provided by us
<tns:spPassword>ZGY3NjNlNTIxNmJlMjQ1MDU3Yzc0OWE4NzM1ZTY3NzAwOWFhYmI1ZDk3YTg4ZjNiNzlmYTRlMjY5ZDFlMzFmYg==</tns:spPassword> 
//Password, provided by us. Encrypted using Base64(sha256(SPid+Password+Timestamp))
<tns:serviceId>107031000</tns:serviceId> //Service id, provided by us
<tns:timeStamp>20190808201801</tns:timeStamp> //Timestamp, in format yyyymmddhhmmss
</tns:RequestSOAPHeader>
</soapenv:Header>
<soapenv:Body>
<req:RequestMsg><![CDATA[<?xml version="1.0" encoding="UTF-8"?>
<request xmlns='.$url.'>
<Transaction>
<CommandID>PromotionPayment</CommandID> //The command id for a b2c. You can use PromotionPayment or BusinessPayment.
<LanguageCode></LanguageCode>
<OriginatorConversationID>001</OriginatorConversationID> //This is unique to every request
<ConversationID> </ConversationID>
<Remark> </Remark>
<Parameters>
<Parameter>
<Key>Amount</Key>
<Value>1</Value> //Amount
</Parameter>
<Parameter>
<Key>Key1</Key> //Constant variable, remains the same
<Value>Value1</Value> //Constant variable, remains the same
</Parameter>
</Parameters>
<ReferenceData>
<ReferenceItem>
<Key>QueueTimeoutURL</Key> // Your queue timeout url
<Value>http://10.66.49.789:7888/new</Value>
</ReferenceItem>
<ReferenceItem>
<Key>Occasion</Key>
<Value>Jamuhuri</Value>
</ReferenceItem>
</ReferenceData>
<Timestamp>2019-08-08T20:18:01.2109675Z</Timestamp> //Timestamp
</Transaction>
<Identity>
<Caller>
<CallerType>2</CallerType>//Constant variable, remains the same
<ThirdPartyID> </ThirdPartyID>
<Password>Password0</Password>//Constant variable, remains the same
<CheckSum>CheckSum0</CheckSum>//Constant variable, remains the same
<ResultURL>ResultURL0</ResultURL>//Cons tant variable, remains the same
</Caller>
<Initiator>
<IdentifierType>11</IdentifierType>//Constant variable, remains the same
<Identifier>testAPI</Identifier> //Provided by us
<SecurityCredential>NDkwMzY5ZDU4NGVjZDIwNjc4OWNlYTdmZGI2MjM2NzNlYjk5ZTZlZDIzYzJlMjc1YzcwNDAwMjVkN2Q0ZmNhZg==</SecurityCredential> //Needs to be encrypted using the step 5.
<ShortCode>511382</ShortCode> //Shortcode for thebusiness
</Initiator>
<PrimaryParty>
<IdentifierType>4</IdentifierType> //Constant variable, remains the same
<Identifier>511382</Identifier> //Short code
<ShortCode>511382</ShortCode> //Short code</PrimaryParty>
<ReceiverParty>
<IdentifierType>1</IdentifierType>
<Identifier>254795877416</Identifier> //MSISDN receiving the money
<ShortCode>ShortCode1</ShortCode> //Constant variable, remains the same
</ReceiverParty>
<AccessDevice>
<IdentifierType>1</IdentifierType> //Constant variable, remains the same
<Identifier>Identifier3</Identifier>//Constant variable, remains the same
</AccessDevice>
</Identity>
<KeyOwner>1</KeyOwner> //Constant variable, remains the same
</request>]]></req:RequestMsg>
</soapenv:Body>
</soapenv:Envelope>
';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "$xml_data");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);


file_put_contents("~/result.txt", $output);
?>