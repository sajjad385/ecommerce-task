<?php 
$url = "http://localhost/ecommerce-task";
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">      
      <a class="navbar-brand" href="<?php $url?>">
        
      </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?= $url?>">All Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= $url?>/categories/tree">Category Tree</a>
            </li>
          </ul>
        </div>
  </div>
</nav>
