<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Help</title>
  </head>
  <body>
    <h1>Help</h1>
    <hr>
    <nav>
      <a href="javascript:history.go(-1)"><button type="button"><= Back</button></a>
    </nav>
    <hr>
    <main>
      <h3>List of attributs</h3>
      <h4>#############################################################################################################</h4>
      <strong>- $this->App("params") : </strong> <= Returns the elements of the first array indicated in the render after the file.
      <pre><?php print_r($this->App("params")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->App("user") : </strong> <= Returns the information of the logged in user.
      <pre><?php print_r($this->App("user")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->App("post") : </strong> <= Returns the information posted by a form.
      <pre><?php print_r($this->App("post")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->App("session") : </strong> <= Returns all the elements of $_SESSION
      <pre><?php print_r($this->App("session")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->App("get") : </strong> <= Returns all the elements of $_GET
      <pre><?php print_r($this->App("get")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->App("request") : </strong> <= Returns all the elements indicated in parameter in the uri
                                                        <u>example:</u>
                                                        http://localhost/?help=index
                                                        |=> will return an array with "help" => index)
      <pre><?php print_r($this->App("request")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->Core("server") : </strong> <= Returns all the elements of $_SERVER
      <pre><?php print_r($this->Core("server")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->Core("parent") : </strong> <= Returns all the elements of the parent class
      <pre><?php  print_r($this->Core("parent")); ?></pre>
      <h4>#############################################################################################################</h4>
    </main>
  </body>
</html>