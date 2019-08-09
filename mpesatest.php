<?php
$url = "http://192.168.9.48:8310/mminterface/request/";

$xml_data = '
<soapenv:Envelope
xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/"
xmlns:req="http://192.168.9.48:8310/mminterface/request">
<!--soap header-->
<soapenv:Header>

    <tns:RequestSOAPHeader xmlns:tns="http://www.huawei.com.cn/schema/common/v2_1">
        <tns:spId>107031</tns:spId>
        <tns:spPassword>ZGVjMGI0Nzg4YzhiMTIwZGIxNmFiODFlMDFhYTAwMGUyZTc5ZjY4OWMxOTQwMThiMDZlNTgyMDQ0MWI4ZDdmMQ==</tns:spPassword>
        <tns:serviceId>107031000<tns:serviceId>
        <tns:timeStamp>20190809160101</tns:timeStamp>
    </tns:RequestSOAPHeader>
</soapenv:Header>

<!--soap body-->
<soapenv:Body>
    <req:RequestMsg><![CDATA[
    <?xml version="1.0" encoding="UTF-8"?>
        <request xmlns:"http://192.168.9.48:8310/mminterface/request">
            <Transaction>
                <CommandID>PromotionPayment</CommandID>
                <LanguageCode></LanguageCode>
                <OriginatorConversationID>90293269</OriginatorConversationID>
                <ConversationID></ConversationID>
                <Remark></Remark>
                    <Parameters>
                        <!--parameter1-->
                        <Parameter>
                            <Key>Amount</Key>
                            <Value>1</Value>
                        </Parameter>
                         <!--parameter2-->
                    </Parameters>
                    <ReferenceData>
                        <ReferenceData>
                            <ReferenceItem>
                                <Key>QueueTimeoutURL</Key>
                                <Value>http://10.66.49.789:7888/new</Value>
                            </ReferenceItem>
                            <ReferenceItem>
                                <Key>Occasion</Key>
                                <Value>Jamuhuri</Value>
                            <ReferenceItem>
                        </ReferenceData>
                        <Timestamp>20190809160101</Timestamp>
            </Transaction>
            <Identity>
                <Caller>
                    <CallerType>2</CallerType>
                    <ThirdPartyID></ThirdPartyID>
                    <Password></Password>
                    <CheckSum></CheckSum>
                    <ResultURL>ResultURL</ResultURL>
                </Caller>
                <Initiator>
                    <IdentifierType>11</IdentifierType>
                    <Identifier>testAPI</Identifier>
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
                    <ShortCode>511382</ShortCode>
                <ReceiverParty>
                <AccessDevice>
                    <IdentifierType>1</IdentifierType>
                    <Identifier>GalaxyS9+</Identifier>
                </AccessDevice>
            </Identifier>
            <KeyOwner>1</KeyOwner>
        </request>]]>
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