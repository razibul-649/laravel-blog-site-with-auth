<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Send Your Mail</title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <br>
        <div class="card" id="card-id">
          <div class="card-head">
            <h3 class="text-center text-success p-3">Send Mail</h3>
          </div>
          <div class="card-body">
            <form action="{{ route('send-mail-post')}}" method="POST">
              @csrf()
              <div class="mb-3">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email..." required>
              </div>
              <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject..." required>
              </div>
              <div class="mb-3">
                <label for="message_body" class="form-label">Your Message</label>
                <textarea name="message_body" id="message_body" class="form-control" placeholder="Type your message...."></textarea>
              </div>
              <p class="text-center">
                <input type="reset" value="Reset" class="btn btn-danger btn-sm">
                <input type="submit" name="sendMailBtn" value="Send Mail" class="btn btn-primary btn-sm">
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <button type="button" onclick="change_color()">Change color</button>


  <script>
    function change_color() {
      $('#card-id').css('background-color', 'gray');
    }
  </script>
</body>
</html>