<!doctype html>
<html>
<head>
  <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1" >
  <meta name="keywords" content="Joao Prates, Joao Prates photographer, Joao Prates art photo, Joao Prates tulip photo, Joao Prates The Hague, Joao Prates the Netherlands, Joao Prates Den Haag, Joao Prates Amazon photo, Tulip Art, Tulip photo art, Golden Tulips, Tulips Art, Tulips photo art, Amazon art, Amazon photo art, Still life Tulip, Still life Amazon, Dutch masters, Dutch tulips, Still-life photo, Amazon still-life photo fruits and vegetables, Albert Eckhout" />
  <meta name="description" content="Joao Prates Photography" />

  <title>Joao Prates Photography</title>

  <link rel="stylesheet" href="https://use.typekit.net/ond1quc.css">
  <link href="https://fonts.googleapis.com/css2?family=Bitter:ital,wght@0,100;0,400;0,500;0,700;0,900;1,100;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Infant:wght@700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<?php
if(is_front_page()):
  $jp_classes = array('jp_front_class', 'front_class');
else:
  $jp_classes = array('no_jp_front_class');
endif;
?>

<body <?php body_class($jp_classes); ?>>
  <header>
  <?php include (TEMPLATEPATH . '/navigation.php'); ?>
	</header>
