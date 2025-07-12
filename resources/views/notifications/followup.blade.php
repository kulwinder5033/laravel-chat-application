<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Email Template</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lexend&display=swap');
      @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap');
      </style>
    <style>
        body {
          margin: 0;
          padding: 0;
          background-color: #f4f4f4;
        }
        table {
          border-collapse: collapse;
          background-color: #f9f9f9;
        }
        .email-container {
          max-width: 600px;
          margin: auto;
          background-color: #f9f9f9;
          border-radius: 8px;
          overflow: hidden;
          font-family: Arial, sans-serif;
          margin-top: 30px;
          margin-bottom: 30px;
        }
        .email-header {
          background-color: #191970;
          color: #ffffff;
          padding: 20px;
          text-align: center;
          font-size: 24px;
        }
        .email-body {
          padding: 20px;
          font-size: 16px;
          color: #333333;
          line-height: 1.5;
        }
        .email-footer {
          background-color: #f9f9f9;
          text-align: left;
          padding: 20px;
          font-size: 14px;
          color: #111;
        }
        .button {
          display: inline-block;
          margin-top: 20px;
          padding: 12px 24px;
          background-color: #191970;
          color: #ffffff;
          text-decoration: none;
          border-radius: 5px;
        }
      </style>
  </head>
  <body>
    <div style="text-align: center;margin-bottom: 20px;margin-top: 20px;">
      <img src="{{asset('assets/media/logos/logo-black.png')}}" alt="Logo" />
  </div>
    <table class="email-container" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td class="email-body">
          <h2 style="font-family: 'Lexend', sans-serif; font-size: 15px; color: #000;margin-bottom: 25px;">Follow Up Notification,</h2>
          <p style="font-family: 'Inter', sans-serif; margin-bottom: 15px; color: #222; font-size: 13px;">
            <p><strong>Message : </strong> {{ $message }}</p>
          </p>
          <p style="font-family: 'Inter', sans-serif; margin-bottom: 25px; color: #222; font-size: 13px;">
            If you have any questions, feel free to reach out to our support team.
          </p>
        </td>
      </tr>
      <tr>
        <td class="email-footer">
          <h3 style="font-family: Lexend, sans-serif; font-size: 14px; color: #000; margin-top: 50px; font-weight: 500; margin-bottom: 7px;">Best of luck</h3>
        </td>
      </tr>
    </table>
  </body>
</html>
