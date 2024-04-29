
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        * { box-sizing: border-box; }
@import url('https://fonts.googleapis.com/css?family=Rubik:400,500&display=swap');


body {
  font-family: 'Rubik', sans-serif;
}

.container {
  /* display: flex; */
  width:80vh%;
  height: 80vh;
  margin-top: 90px;

}

.left {
    width: 50%;
  overflow: hidden;
  display: flex;
  flex-wrap: wrap;
  width: 50%;
    overflow: hidden;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    justify-content: center;
    animation-name: left;
    animation-duration: 1s;
    animation-fill-mode: both;
    animation-delay: 1s;
    margin: auto;
    border: solid 1px #dad9d9;
    border-radius: 7px;
}

/* .right {
  flex: 1;
  background-color: black;
  transition: 1s;
  background-image: url('img/bg.jpg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
} */



.header > h2 {
  margin: 0;
  color: #4f46a5;
}

.header > h4 {
  margin-top: 10px;
  font-weight: normal;
  font-size: 15px;
  color: rgba(0,0,0,.4);
}

.form {
  max-width: %;
  display: flex;
  flex-direction: column;
}

.form > p {
  text-align: right;
}

.form > p > a {
  color: #000;
  font-size: 14px;
}

.form-field {
  height: 46px;
  padding: 0 16px;
  border: 2px solid #ddd;
  border-radius: 4px;
  font-family: 'Rubik', sans-serif;
  outline: 0;
  transition: .2s;
  margin-top: 20px;
}

.form-field:focus {
  border-color: #0f7ef1;
}

.btn-sub{
  padding: 12px 10px;
  border: 0;
  background: linear-gradient(to right, #de48b5 0%,#0097ff 100%);
  border-radius: 3px;
  margin-top: 10px;
  color: #fff;
  letter-spacing: 1px;
  font-family: 'Rubik', sans-serif;
}

.animation {
  animation-name: move;
  animation-duration: .4s;
  animation-fill-mode: both;
  animation-delay: 2s;
}

.a1 {
  animation-delay: 2s;
}

.a2 {
  animation-delay: 2.1s;
}

.a3 {
  animation-delay: 2.2s;
}

.a4 {
  animation-delay: 2.3s;
}

.a5 {
  animation-delay: 2.4s;
}

.a6 {
  animation-delay: 2.5s;
}

@keyframes move {
  0% {
    opacity: 0;
    visibility: hidden;
    transform: translateY(-40px);
  }

  100% {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
  }
}

@keyframes left {
  0% {
    opacity: 0;
    width: 0;
  }

  100% {
    opacity: 1;
    padding: 20px 40px;
    width: 440px;
  }
}

    </style>
</head>
<body>
<h1>
<div class="container">
  <div class="left">
    <div class="header">
      <h2 class="animation a1">Validé votre</h2>
      <h2 class="animation a1">présence</h2>
      <br>
      <h4 class="animation a2">Entre votre information</h4>
    </div>
    <form class="form"  method='post' action="{{route("directeurs.store")}}">
    @csrf
      <input type="text" class="form-field animation a3" placeholder="nom"  name="nom">
      <input type="text" class="form-field animation a4" placeholder="prenom" name="prenom">
      <input type="text" class="form-field animation a4" placeholder="telephone" name="telephone">
      <select class="form-field animation a4" name="ecole_id" >
        @foreach ($ecoles as $ecole)
            <option value="{{{$ecole->id}}}">{{{$ecole->nom_ecole}}}</option>
        @endforeach
    </select>
    <input class="animation a6 btn-sub"  type="submit" value="Ok">

</form>
  </div>
  <!-- <div class="right"></div> -->
</div>
</h1>
</body>
</html>
