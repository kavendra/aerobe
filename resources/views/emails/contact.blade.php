<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Contact Message</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }
    table {
      border-spacing: 0;
    }
    td {
      padding: 0;
    }
    img {
      border: 0;
    }
    .email-wrapper {
      max-width: 600px;
      margin: auto;
      background-color: #ffffff;
      font-family: Arial, sans-serif;
      border-radius: 8px;
      overflow: hidden;
    }
    .email-header {
      background-color: #0044cc;
      color: white;
      padding: 20px;
      text-align: center;
      font-size: 24px;
    }
    .email-body {
      padding: 30px;
      color: #333333;
    }
    .email-body p {
      margin: 15px 0;
      line-height: 1.6;
    }
    .email-footer {
      background-color: #eeeeee;
      padding: 20px;
      text-align: center;
      font-size: 12px;
      color: #666666;
    }
  </style>
</head>
<body>
  <table width="100%" bgcolor="#f2f2f2">
    <tr>
      <td>
        <table class="email-wrapper" width="100%">
          <tr>
            <td class="email-header">
              Contact Us Message
            </td>
          </tr>
          <tr>
            <td class="email-body">
              <p><strong>Name:</strong> {{ $name }}</p>
              <p><strong>Email:</strong> {{ $email }}</p>
              <p><strong>Phone:</strong> {{ $phone }}</p>
              <p><strong>Message:</strong><br>{{ $content }}</p>
            </td>
          </tr>
          <tr>
            <td class="email-footer">
              &copy; {{ date('Y') }} Aerobe All rights reserved.
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>