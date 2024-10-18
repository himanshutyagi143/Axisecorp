<!-- resources/views/emails/contact.blade.php -->
<html>
<body>
    <p><strong>Name:</strong> {{ $data['txtName'] }}</p>
    <p><strong>Email:</strong> {{ $data['txtEmail'] }}</p>
    <p><strong>Phone:</strong> {{ $data['txtPhone'] }}</p>
    <p><strong>Message:</strong> {{ $data['txtMsg'] }}</p>
</body>
</html>
