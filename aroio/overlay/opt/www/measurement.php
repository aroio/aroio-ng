<?php
  include('strings.php');
  include('functions.inc.php');
  include('style.css');

//print_r($_POST);

  if($_GET["lang"] === "en" || $_POST[lang]=='en')
  {
      $lang='en';
      $GLOBALS["lang"]='en';
  }
  else
  {
    $lang='de';
    $GLOBALS["lang"]='de';
  }

  // Load ini-array from userconfig.txt
  $ini_array = parse_ini_file("/boot/userconfig.txt", 1);

  include "header.php";?>

  <!-- Navigation -->
  <ul>
    <li><a href="index.php" target=""><? print ${linktext_configuration._.$lang} ?></span></a></li>
    <li><a href="system.php" target=""><? print ${linktext_system._.$lang} ?></a></li>
    <li><a class="select" href="measurement.php" target=""><? print${linktext_measurement._.$lang} ?></a></li>
    <li> <?
      if ($ini_array['BRUTEFIR'] == "OFF")
      {  ?>
        <a style="color: #c5c5c5" href="brutefir.php"target=""><? print ${linktext_brutefir._.$lang} ?></a> <?
      }
      else
      { ?>
          <a href="brutefir.php"target=""><? print ${linktext_brutefir._.$lang} ?></a> <?
      } ?>
    </li>
    <li style="float:right"><a href="credits.php" target=""><? print ${linktext_credits._.$lang} ?></a></li>
  </ul><!-- Ende Navigation -->

  <hr class="top">
  </div> <!-- Ende vom Head -->

  <form id="Network settings" Name="Network settings" action="" method="post">
    <div class="content">
      <h1><? print $ini_array["HOSTNAME"] ?> - <? print ${page_title_measurement._.$lang}?></h1>
      <!-- Raumkorrekturmessung -->
      <fieldset>
        <legend>
          <? print ${measurement_form._.$lang} ; ?>
        </legend>

      <?
      print ${measurement_warning._.$lang};
      if (isset($_POST['PLAY_NOISE']))
        {
          if($_POST['MEASURE_MS'] == "ON")
            {
              $ms="ms_on";
            }
          play_noise($ms);
        }
      if (isset($_POST['STOP_NOISE'])) stop_noise();
      if (isset($_POST['CANCEL_MEASUREMENT'])) cancel_measurement();
      if (isset($_POST['MEASUREMENT']) || file_exists('/tmp/measurement')) 
      {
        if (!file_exists('/tmp/measurement') && isset($_POST['MEASURE_MS']))
        {
          $shell_exec_ret=shell_exec('cardmount rw');
          wrtToUserconfig("MEASUREMENT_OUTPUT","vol-plug-ms");
          $shell_exec_ret=shell_exec('cardmount ro');
        }
        elseif(!file_exists('/tmp/measurement'))
        {
         $shell_exec_ret=shell_exec('cardmount rw');
         wrtToUserconfig("MEASUREMENT_OUTPUT","vol-plug");
         $shell_exec_ret=shell_exec('cardmount ro');
        } ?>
        <pre> <?
          print ${measurement_runs_.$lang}; ?>
        </pre>
        <input type="submit" class="button" value=" <? print ${cancel_measurement._.$lang} ?> " name="CANCEL_MEASUREMENT"> <?
        if (!file_exists('/tmp/measurement')) measurement();
        $measurement_done="true";
      }
      elseif (isset($_POST['MEASUREMENT_CONTROL']))  
      {
        if (isset($_POST['MEASURE_MS']))
        { 
          $shell_exec_ret=shell_exec('cardmount rw');
          wrtToUserconfig("MEASUREMENT_OUTPUT","jack-bfms");
          $shell_exec_ret=shell_exec('cardmount ro');
        }
        else
        {
         $shell_exec_ret=shell_exec('cardmount rw');
         wrtToUserconfig("MEASUREMENT_OUTPUT","jack-bf");
         $shell_exec_ret=shell_exec('cardmount ro');
        } ?>
        <pre> <?
          print ${measurement_runs_.$lang}; ?>
        </pre>
        <input type="submit" class="button" value=" <? print ${cancel_measurement._.$lang} ?> " name="CANCEL_MEASUREMENT"> <?
        measurement();
        $measurement_done="true";
      }
      else
      { 
        if (isset($_POST['PLAY_NOISE']))
        { ?>
          <input type="submit" class="button" value=" <? print ${stop_noise._.$lang} ?> " name="STOP_NOISE"> <br> <?
        }
        else
        { ?>
          <input type="submit" class="button" value=" <? print ${play_noise._.$lang} ?> " name="PLAY_NOISE">
          <input type="submit" class="button" value=" <? print ${start_measurement._.$lang} ?> " name="MEASUREMENT">
          <input type="submit" class="button" value=" <? print ${start_measurement_control._.$lang} ?> " name="MEASUREMENT_CONTROL"> <?
        
          if (preg_match("/.*(ms).*$/", $ini_array['MEASUREMENT_OUTPUT']))
          { ?>
            <input type="checkbox" id="measure_ms" name="MEASURE_MS" value="ON" checked> Clean! <?
          }
          else
          { ?>
            <input type="checkbox" id="measure_ms" name="MEASURE_MS" value=""> Clean! <?
          }
        }
      } ?>
    </div> <!-- Ende Raumkorrekturmessung -->

    <div class="content">
    <!-- Auswertung der Messung -->
    <fieldset>
      <legend>
        <? print ${measurement_analysis_form._.$lang} ; ?>
      </legend>
      <a href="http://www.audiovero.de" target="_blank"> <img class="link" src="audiovero.png" border="0" style="float: right;"> 	</a>
      <? print "${measurement_analysis_text._.$lang}" ; ?>
    </div>
  </form>
<? include "footer.php"; ?>
