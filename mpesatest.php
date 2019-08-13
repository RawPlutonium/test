<?php
$url = "http://192.168.9.48:8310/mminterface/request/";

$xml_data = '
<soapenv:Envelope 
xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" 
xmlns:req="http://api-v1.gen.mm.vodafone.com/mminterface/request">
<soapenv:Header>
<tns:RequestSOAPHeader 
xmlns:tns="http://www.huawei.com/schema/osg/common/v2_1">
<tns:spId>107031</tns:spId>	
<tns:spPassword>ZGVjMGI0Nzg4YzhiMTIwZGIxNmFiODFlMDFhYTAwMGUyZTc5ZjY4OWMxOTQwMThiMDZlNTgyMDQ0MWI4ZDdmMQ==</tns:spPassword>
<tns:timeStamp>20190809160101</tns:timeStamp>
<tns:serviceId>107031000</tns:serviceId>
</tns:RequestSOAPHeader>
</soapenv:Header>
<soapenv:Body>
<req:RequestMsg>
<![CDATA[<?xml version="1.0" encoding="UTF-8"?>
<Request xmlns="http://api-v1.gen.mm.vodafone.com/mminterface/request">
<Transaction>
<CommandID>BusinessPayment</CommandID>
<LanguageCode></LanguageCode>
<OriginatorConversationID>7872348</OriginatorConversationID>
<ConversationID></ConversationID>
<Remark>0</Remark>
<Parameters>
<Parameter>
<Key>Amount</Key>
<Value>100.0</Value>
</Parameter>
</Parameters>
<ReferenceData>
<ReferenceItem>
<Key>QueueTimeoutURL</Key>
<Value>http://172.29.26.139:3000</Value>
</ReferenceItem>
<ReferenceItem>
<Key>TransactionID</Key>
<Value>coop</Value>
</ReferenceItem>
</ReferenceData>
<Timestamp>20180207131008</Timestamp>
</Transaction>
<Identity>
<Caller>
<CallerType>2</CallerType>
<ThirdPartyID>broker_4</ThirdPartyID>
<Password>ZGVjMGI0Nzg4YzhiMTIwZGIxNmFiODFlMDFhYTAwMGUyZTc5ZjY4OWMxOTQwMThiMDZlNTgyMDQ0MWI4ZDdmMQ==</Password>
<ResultURL>http://http://172.29.26.139:3000</ResultURL>
</Caller>
<Initiator>
<IdentifierType>11</IdentifierType>
<Identifier>testapi</Identifier>
<SecurityCredential>YTlkNzAyOTNmNzM5MTdlMTk3ZTljOTQ3ODEwOWJkOWZhNTY4N2M2OGY4OTMyMTU2YzAxZDk5ODczZDE4Y2FkYg==</SecurityCredential>
<ShortCode>511382</ShortCode>
</Initiator>
<PrimaryParty>
<IdentifierType>4</IdentifierType>
<Identifier>511382</Identifier>
<ShortCode>511382</ShortCode>
</PrimaryParty>
<ReceiverParty>
<IdentifierType>1</IdentifierType>
<Identifier>254795877416</Identifier>
<ShortCode></ShortCode>
</ReceiverParty>
<AccessDevice>
<IdentifierType>1</IdentifierType>
<Identifier>1</Identifier>
</AccessDevice>
</Identity>
<KeyOwner>1</KeyOwner>
</Request>
]]>
</req:RequestMsg>
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
print_r($output);
?>