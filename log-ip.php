<?php
// استقبال البيانات المرسلة من الواجهة الأمامية
$data = json_decode(file_get_contents('php://input'), true);
$userIP = $data['ip'];

// إضافة الوقت والتاريخ
$timestamp = date('Y-m-d H:i:s');

// كتابة البيانات في ملف نصي
$logMessage = "زيارة جديدة - عنوان IP: $userIP - الوقت: $timestamp\n";

// حفظ السجل في ملف نصي
if (file_put_contents('ip-log.txt', $logMessage, FILE_APPEND)) {
    echo "تم تسجيل زيارتك بنجاح!";
} else {
    echo "حدث خطأ أثناء تسجيل الزيارة.";
}
?>