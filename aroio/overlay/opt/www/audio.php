<form id="Audio settings" Name="Audio settings" action="" method="post">
  <div class="content">
    <fieldset>
      <legend><? print ${audio_form._.$lang};?></legend>
      <table>
        <tr>
          <td>
            <a title="<? print ${helptext_advancedsettings._.$lang} ?>"class="tooltip">
            <span title=""><label for="Advanced settings"> <? print ${advancedsettings._.$lang} ; ?> </label></span></a>
            <input type="hidden" name="ADVANCED" value="OFF"> <?

            if ($ini_array["ADVANCED"] == "ON")
            { ?>
              <input type="checkbox" id="advanced" name="ADVANCED" value="ON" checked> <?
            }
            else
            { ?>
              <input type="checkbox" id="advanced"name="ADVANCED" value="ON"> <?
            } ?>
          </td>
        </tr>

        <tr>
          <td>
            <a title="<? print ${helptext_playername._.$lang} ?>"class="tooltip">
            <span title=""><label for="Player name"> <? print ${player_name._.$lang} ; ?> </label></span></a>
          </td>
          <td>
            <? if ( $ini_array["PLAYERNAME"] == "" ) { $ini_array["PLAYERNAME"] = $ini_array["HOSTNAME"]; } ?>
            <input class="actiongroup" type="text" name="PLAYERNAME" value="<? print $ini_array["PLAYERNAME"] ?>">
          </td>
        </tr>
        <tr>
          <td>
            <a title="<? print ${helptext_volume._.$lang} ?>"class="tooltip">
            <span title=""><label for="Volume"> <? print ${volume._.$lang} ; ?> </label></span></a>
          </td>
          <td> <?
      	    $arr_volume=array
            (
              array(255," 0 dB"),
              array(204,"-5 dB"),
              array(162,"-10 dB"),
              array(132,"-15 dB"),
              array(108,"-20 dB"),
              array(84,"-25 dB"),
              array(66,"-30 dB"),
              array(51,"-35 dB"),
              array(36,"-40 dB"),
              array(24,"-45 dB"),
              array(18,"-50 dB"),
              array(9,"-55 dB"),
              array(6,"-60 dB")
            );
            
            print_optgroup2D("VOLUME_START",$arr_volume,$ini_array["VOLUME_START"]); ?>
          </select>
          </td>
        </tr>

        <tr>
          <td>
            <a title="<? print ${helptext_soundcard._.$lang} ?>"class="tooltip">
            <span title=""><label for="Soundcard"> <? print ${soundcard._.$lang} ; ?> </label></span></a>
          </td>
          <td>
            <?$arr_soundcard= array('Internal HDMI audio','Internal audio jack','AroioDAC','JustBoom DAC','HiFiBerry DAC','HiFiBerry DAC+','HiFiBerry Digi','IQAudIO DAC','Dr. DAC prime','Focusrite Scarlett','M-Audio Fast Track Pro','RME Fireface UCX','USB Class Compliant');
              print_optgroup("SOUNDCARD",$arr_soundcard,$ini_array["SOUNDCARD"]); ?>
          </td>
        </tr>
      </table>

      </-- Audio Output Auswahl-->
      <div class="content">
        <table>
          <tr>
            <td>
              Samplerate:
            </td>
            <td> <?
              switch ($ini_array["SOUNDCARD"])
              {
                case "Internal HDMI audio":
                case "Internal audio jack":
                case "M-Audio Fast Track Pro":
                    $arr_rate= array('44100','48000');
                    break;

                case "AudioQuest DragonFly":
                case "AudioQuest Beetle":
                case "RME Fireface UCX":
                case "Focusrite Scarlett":
        			  case "Dr. DAC prime":
                  $arr_rate= array('44100','48000','96000');
                  break;

                case "XMOS Evaluation Board":
                case "USB Class Compliant":
                case "AroioDAC":
                case "IQAudIO DAC":
                case "HiFiBerry Digi":
                case "HiFiBerry DAC":
                case "JustBoom DAC":
                  $arr_rate= array('44100','48000','96000','192000');
                  break;
              }
              print_optgroup("RATE",$arr_rate,$ini_array["RATE"]); ?>
            </td>
          </tr> <?
          include "audio_adv.php"; ?>
        </table>
      </div>
    </fieldset>
  </div> <?
      
  include "audio_matrix.php"; ?>

  <br>
  <input class="button" type="submit" value=" <? print ${button_submit_audiosettings._.$lang} ?> " name="audiosettings_submit">
  <br>
  
  <div class="content">
    <input class="button" type="submit" value=" <? print ${button_submit._.$lang} ?> " name="submit">
    <input class="button" type="submit" value=" <? print ${button_reboot._.$lang} ?> " name="reboot">
  </div>
</form>