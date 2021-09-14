<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title>Help Index</title>
  </head>
  <body>
    <h1>Help Index</h1>
    <hr>
    <nav>
      <a href="javascript:history.go(-1)"><button type="button"><= Back</button></a>
    </nav>
    <hr>
    <main>
      <h3>List of attributs</h3>
      <h4>#############################################################################################################</h4>
      <strong>- $this->getApp("params") : </strong> <= Returns the elements of the first array indicated in the render after the file.
      <pre><?php print_r($this->getApp("params")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->getApp("user") : </strong> <= Returns the information of the logged in user.
      <pre><?php print_r($this->getApp("user")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->getApp("POST") : </strong> <= Returns the information posted by a form.
      <pre><?php print_r($this->getApp("POST")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->getApp("SESSION") : </strong> <= Returns all the elements of $_SESSION
      <pre><?php print_r($this->getApp("SESSION")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->getApp("GET") : </strong> <= Returns all the elements of $_GET
      <pre><?php print_r($this->getApp("GET")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->getApp("REQUEST") : </strong> <= Returns all the elements indicated in parameter in the uri
                                                        <u>example:</u>
                                                        http://localhost/?help=index
                                                        |=> will return an array with "help" => index)
      <pre><?php print_r($this->getApp("REQUEST")) ?></pre>
      <h4>-------------------------------------------------------------------------------------------------------------</h4>
      <strong>- $this->getApp("SERVER") : </strong> <= Returns all the elements of $_SERVER
      <pre><?php print_r($this->getApp("SERVER")) ?></pre>
      <h4>#############################################################################################################</h4>
    </main>
  </body>
</html>