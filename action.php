<?php
require __DIR__ . '/vendor/autoload.php';

try {
    $client = new Google_Client();
    $client->setApplicationName('Google Sheets API PHP');
    $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
    $client->setAuthConfig(__DIR__ . '/credentials.json');
} catch (Google_Exception $e) {
    echo $e->getMessage();
}

$service = new Google_Service_Sheets($client);

$spreadsheetId = '1RJMU01G2uXeOkTCucNQY6nSdwxyahfquCsT3abrW-Vk';
$range = 'Sheet1';

$values = [
    [$_POST['name'], $_POST['phone'], $_POST['tinh'], $_POST['quan_huyen'], $_POST['phuong_xa'], $_POST['address']]
];
$body = new Google_Service_Sheets_ValueRange([
    'values' => $values
]);
$params = [
    'valueInputOption' => 'RAW'
];
$insert = [
    'insertDataOption' => 'INSERT_ROWS'
];
$result = $service->spreadsheets_values->append(
    $spreadsheetId,
    $range,
    $body,
    $params,
    $insert
);
if($result){
    $res = json_encode(array('status'=>'success','message'=>'Thông tin của bạn đã được lưu'));
}else{
    $res = json_encode(array('status'=>'error','message'=>'Thông tin của bạn chưa được lưu'));
}
return $res;


