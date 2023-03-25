<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <head>
      <link rel="stylesheet" href="../css/post.css" />
      <script>
        function displayImage() {
          var input = document.getElementById("image-input");
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
              document.getElementById("image-preview").src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
          }
        }
      </script>
    </head>
    <title>POST on The Form</title>
  </head>
  <body>
    <div class="heading">POST</div>

    <form action="../validation/posts.php" method="post">
      <label for="title">Title:</label><br />
      <input type="text" id="title" name="title" /><br />
      <label for="content">Content:</label><br />
      <textarea id="content" name="content"></textarea><br /><br />
      <input type="file" id="image-input" onchange="displayImage()" />
      <img id="image-preview" src=" " alt="your image" />
      <br /><br />

      <div class="buttons">
        <input type="submit" value="Submit" id="submit" />
        <a href="index.php">
          <input type="submit" value="Cancel" id="Cancel"  ></a>
      </div>
    </form>
  </body>
</html>