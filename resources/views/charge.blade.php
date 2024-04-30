<html>
<head>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Stripe integration tutorial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<form action="/charge" method="POST">
    {{ csrf_field() }}
    <label for="amount">
        Amount (in cents):
        <input type="text" name="amount" id="amount">
    </label>

    <label for="email">
        Email:
        <input type="text" name="email" id="email">
    </label>

    <label for="card-element">
        Credit or debit card
    </label>
    <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>

    <button type="submit">Submit Payment</button>
	
</form>

<div class="container">
      
    <h1 class="my-5 text-center">Laravel Stripe integration tutorial</h1>
    <div class="row justify-content-center"> 
        <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title"></h5>
                <p class="card-text"></p>
                <a href="" class="btn btn-primary"></a>
              </div>
            </div>
        </div>
       
    </div>
          
</div>
 



</body>
</html>

<!-- Stripe JS -->
<script src="https://js.stripe.com/v3/"></script
