<?php
/**
 * Template Name: Contato Page
 *
 * @package WordPress
 * @subpackage Sapeca Paz
 * @since Gustavo Guichard 2012
 */

if(isset($_POST['submitted'])) {
  if(trim($_POST['contactName']) === '') {
    $nameError = 'Please enter your name.';
    $hasError = true;
  } else {
    $name = trim($_POST['contactName']);
  }

  if(trim($_POST['email']) === '')  {
    $emailError = 'Please enter your email address.';
    $hasError = true;
  } else if (!preg_match("/^[[:alnum:]][a-z0-9_.-]*@[a-z0-9.-]+\.[a-z]{2,4}$/i", trim($_POST['email']))) {
    $emailError = 'You entered an invalid email address.';
    $hasError = true;
  } else {
    $email = trim($_POST['email']);
  }

  if(trim($_POST['comments']) === '') {
    $commentError = 'Please enter a message.';
    $hasError = true;
  } else {
    if(function_exists('stripslashes')) {
      $comments = stripslashes(trim($_POST['comments']));
    } else {
      $comments = trim($_POST['comments']);
    }
  }

  if(!isset($hasError)) {
    $emailTo = "sapecapaz@sapecapaz.com.br";
    $subject = 'Mensagem pelo site: '.$name;
    $body = "Nome: $name \n\nEmail: $email \n\nMensagem: $comments";
    $headers = 'From: '.$name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
    wp_mail($emailTo, $subject, $body, $headers);
    $emailSent = true;
  }

}

get_header(); ?>
<div id="main">
  <article class="post">
    <div id="contact-section">
    	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
      <?php if(!isset($hasError) && isset($_POST['submitted'])):?>
      <h2 class="success">Sua mensagem foi enviada com sucesso!</h2>
      <?php the_content();?>
      <?php else:?>
      <?php the_content();?>
      <?php if(isset($hasError)):?> 
      <h6 class="error">Você não preencheu corretamente todos os campos. Por favor, revise antes de enviar.</h46>
      <?php endif;?>
      <form action="<?php the_permalink(); ?>" id="contactForm" method="post" <?php if(isset($hasError)){echo "class=\"error\"";};?>>
        <input type="text" name="contactName" id="contactName" value="" placeholder="Nome" required />
        <input type="email" name="email" id="email" value="" placeholder="Email" required />
        <textarea name="comments" id="commentsText" rows="8" cols="40" placeholder="Mensagem" required></textarea>
        <input type="submit" value="Enviar" />
        <input type="hidden" name="submitted" id="submitted" value="true" />
      </form>
      <?php endif;?> 
    	<?php endwhile; // end of the loop. ?>
    </div>
  </article>
</div>
<?php get_footer(); ?>