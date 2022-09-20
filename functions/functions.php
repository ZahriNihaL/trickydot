<?php
include("../includes/db.php");
session_start();

if(isset($_POST['logout'])){

  unset($_SESSION['loggedin']);
  header("Location:../login.php");

}


if(isset($_POST["login"])){
  $username = $_POST["username"];
  $password = $_POST["password"];

  $passhash = hash("sha256", $password);

  $sql = "select * from tbl_users where username='$username' and password='$passhash'";
  $run = mysqli_query($con, $sql);
  $count = mysqli_num_rows($run);
  if($count==0){
    header("Location: ../login.php?error=Invalid credential");
  }
  else{
    $_SESSION["loggedin"] = true;
    header("Location: ../index.php");
  }
}



if(isset($_POST["add_slide"])){

  $title = $_POST["title"];
  $img = $_FILES["image"]["name"];
  $tmp_name = $_FILES["image"]["tmp_name"];

  $to = "../assets/images/slideshow/".$img;

  move_uploaded_file($tmp_name, $to);

  $sql = "insert into tbl_slideshow(title, img) values('$title', '$img')";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../slideshow.php?success=slideshow added successfully");
  }else{
    header("Location: ../add_slideshow.php?error=failed to add slideshow!");
  }
}
if(isset($_POST["delete_slide"])){
  $id = $_POST["id"];
  $sql = "delete from tbl_slideshow where id='$id'";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../slideshow.php?success=slideshow deleted successfully");
  }else{
    header("Location: ../slideshow.php?error=Failed to delete slideshow!");
  }

} 

if(isset($_POST["update_slide"])){
  $id = $_POST["id"];
  $title = $_POST["title"]; 

  $img="";
  if ($_FILES['image']['size'] == 0)
  {
    $img = $_POST["old_img"];
  }else{
    $img = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];

    $to = "../assets/images/slideshow/".$img;

    move_uploaded_file($tmp_name, $to);
  }

  $sql = "update tbl_slideshow set title='$title', img='$img' where id='$id'";
  $run = mysqli_query($con,$sql);
  if($run == TRUE){
    header("Location: ../slideshow.php?success=slideshow edited successfully");
  }else{
    header("Location: ../faq.php?error=failes to edit slideshow!");
  }

}




if(isset($_POST["add_portfolio"])){
  $name = $_POST["name"];
  $img = $_FILES["img"]["name"];
  $description = $_POST["description"];
  $tmp_name = $_FILES["img"]["tmp_name"];

  $to = "../assets/images/portfolio/".$img;

  move_uploaded_file($tmp_name, $to);

  $sql = "insert into tbl_portfolio(name,img,description) values('$name','$img','$description')";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../portfolio.php?success=portfolio added successfully");
  }else{
    header("Location: ../portfolio.php?error=failed to add portfolio!");
  }
}

if(isset($_POST["delete_portfolio"])){
  $id = $_POST["id"];
  $sql = "delete from tbl_portfolio where id='$id'";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../portfolio.php?success=portfolio deleted successfully");
  }else{
    header("Location: ../portfolio.php?error=failed to delete portfolio!");
  }
} 



if(isset($_POST["update_portfolio"])){
  $id = $_POST["id"];
  $name = $_POST["name"];

  $img="";
  if ($_FILES['image']['size'] == 0)
  {
    $img = $_POST["old_img"];
  }else{
    $img = $_FILES["image"]["name"];
    $tmp_name = $_FILES["image"]["tmp_name"];

    $to = "../assets/images/portfolio/".$img;

    move_uploaded_file($tmp_name, $to);
  }

  $sql = "update tbl_portfolio set name='$name', img='$img' where id='$id'";
  $run = mysqli_query($con,$sql);
  if($run == TRUE){
    header("Location: ../portfolio.php?success=portfolio updated successfully");
  }else{
    header("Location: ../portfolio.php?error=failes to update portfolio!");
  }

}



if(isset($_POST["add_testimonial"])){
  $name = $_POST["name"];
  $designation = $_POST["designation"];
  $img = $_FILES["img"]["name"];
  $description = $_POST["description"];
  $tmp_name = $_FILES["img"]["tmp_name"];

  $to = "../assets/images/testimonial/".$img;

  move_uploaded_file($tmp_name, $to);

  $sql = "insert into tbl_testimonial(name,designation,img,description) values('$name','$designation','$img','$description')";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../testimonial.php?success=testimonial added successfully");
  }else{
    header("Location: ../testimonial.php?error=failed to add testimonial!");
  }
}

if(isset($_POST["delete_testimonial"])){
  $id = $_POST["id"];
  $sql = "delete from tbl_testimonial where id='$id'";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../testimonial.php?success=testimonial deleted successfully");
  }else{
    header("Location: ../testimonial.php?error=failed to delete testimonial!");
  }

} 

if(isset($_POST["update_testimonial"])){
  $id = $_POST["id"];
  $name = $_POST["name"];

  $img="";
  if ($_FILES['img']['size'] == 0)
  {
    $img = $_POST["old_img"];
  }
  
  else{

  $img = $_FILES["img"]["name"];
  $tmp_name = $_FILES["img"]["tmp_name"];

  $to = "../assets/images/testimonial/".$img;

  move_uploaded_file($tmp_name, $to);

  }

  $sql = "update tbl_testimonial set name='$name', img='$img' where id='$id'";
  $run = mysqli_query($con,$sql);
  if($run == TRUE){
    header("Location: ../testimonial.php?success=testimonial updated successfully");
  }else{
    header("Location: ../testimonial.php?error=failes to update testimonial!");
  }

}



if(isset($_POST["add_customers"])){

  $brand_name = $_POST["brand_name"];
  $image = $_FILES["image"]["name"];
  $tmp_name = $_FILES["image"]["tmp_name"];
  $to = "../assets/images/customers/".$image;

  move_uploaded_file($tmp_name, $to);

  $sql = "insert into tbl_customers(brand_name,image) values('$brand_name','$image')";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../customers.php?success=customers added successfully");
  }else{
    header("Location: ../customers.php?error=Failed to add customers!");
  }
}

if(isset($_POST["delete_customers"])){
  $id = $_POST["id"];
  $sql = "delete from tbl_customers where id='$id'";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../customers.php?success=customer deleted successfully");
  }else{
    header("Location: ../customers.php?error=failed to delete customer!");
  }

} 

if(isset($_POST["update_customers"])){
  $id = $_POST["id"];
  $brand_name = $_POST["brand_name"];
  $image = $_FILES["image"]["name"];
  $tmp_name = $_FILES["image"]["tmp_name"];

  $to = "../assets/images/customers/".$img;

  move_uploaded_file($tmp_name, $to);

  $sql = "update tbl_customers set brand_name='$brand_name', image='$image' where id='$id'";
  $run = mysqli_query($con,$sql);
  if($run == TRUE){
    header("Location: ../customers.php?success=customers edited successfully");
  }else{
    header("Location: ../customers.php?error=failes to edit customers!");
  }

}



if(isset($_POST["add_team"])){
  $name = $_POST["name"];
  $designation = $_POST["designation"];
  $img = $_FILES["image"]["name"];
  $explanation = $_POST["explanation"];
  $tmp_name = $_FILES["image"]["tmp_name"];

  $to = "../assets/images/team/".$img;

  move_uploaded_file($tmp_name, $to);

  $sql = "insert into tbl_team(name,designation,img,explanation) values('$name','$designation','$img','$explanation')";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../team.php?success=Team added successfully");
  }else{
    header("Location: ../team.php?error=Failed to add team!");
  }

}
if(isset($_POST["delete_team"])){
  $id = $_POST["id"];
  $sql = "delete from tbl_team where id='$id'";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../team.php?success=team deleted successfully");
  }else{
    header("Location: ../team.php?error=failed to delete team!");
  }

} 

if(isset($_POST["update_team"])){
  $id = $_POST["id"];
  $name = $_POST["name"];
  $img = $_FILES["img"]["name"];
  $tmp_name = $_FILES["img"]["tmp_name"];

  $to = "../assets/images/team/".$img;

  move_uploaded_file($tmp_name, $to);

  $sql = "update tbl_team set name='$name', img='$img' where id='$id'";
  $run = mysqli_query($con,$sql);
  if($run == TRUE){
    header("Location: ../team.php?success=team updated successfully");
  }else{
    header("Location: ../team.php?error=failes to update team!");
  }

}




if(isset($_POST["add_faq"])){

  $question = $_POST["question"];
  $answer = $_POST["answer"];

  $sql = "insert into tbl_faq(question,answer) values('$question','$answer')";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../faq.php?success=faq added successfully");
  }else{
    header("Location: ../faq.php?error=Failed to add faq!");
  }
}
if(isset($_POST["delete_faq"])){
  $id = $_POST["id"];
  $sql = "delete from tbl_faq where id='$id'";
  $run = mysqli_query($con, $sql);
  if($run == TRUE){
    header("Location: ../faq.php?success=faq deleted successfully");
  }else{
    header("Location: ../faq.php?error=failes to delete faq!");
  }

} 

if(isset($_POST["update_faq"])){
  $id = $_POST["id"];
  $question = $_POST["question"];
  $answer = $_POST["answer"];

  $sql = "update tbl_faq set question='$question', answer='$answer' where id='$id'";
  $run = mysqli_query($con,$sql);
  if($run == TRUE){
    header("Location: ../faq.php?success=faq updated successfully");
  }else{
    header("Location: ../faq.php?error=failes to update faq!");
  }

}
