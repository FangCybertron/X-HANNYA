require "import"
import "android.app.*"
import "android.os.*"
import "android.widget.*"
import "android.view.*"
import "android.content.Context"
import "AndLua"
import "android.content.*"
import "android.provider.Settings"
import "android.net.Uri"
import "android.content.Intent"
import "android.content.pm.PackageManager"
import "android.graphics.PixelFormat"
import "android.graphics.Typeface"
import "android.content.Context"



activity.setTheme(android.R.style.Theme_DeviceDefault)
activity.ActionBar.hide()

  local function isVpnUsed()
    import "java.net.NetworkInterface"
    import "java.util.Collections"
    import "java.util.Enumeration"
    import "java.util.Iterator"
    local nlp= NetworkInterface.getNetworkInterfaces();
    if (nlp~=nil) then
      local it = Collections.list(nlp).iterator();
      while (it.hasNext()) do
        local nlo = it.next();
        if (nlo.isUp() && nlo.getInterfaceAddresses().size() ~= 0) then
          if ((tostring(nlo):find("tun0")) or (tostring(nlo):find("ppp0"))) then
            return true
          end
        end
      end
      return false
    end
  end
  local y=pcall(function()
    local ti=Ticker()
    ti.Period=100
    ti.start()
    ti.onTick=function()
      pcall(function()
        if isVpnUsed() then
          os.exit()--退出程序。          --如果你不延迟的话，就直接显示不了信息。
          ti.stop()--退出程序时停止计时器。
          activity.finish()--关闭当前页面。
        end
      end)
    end
    function onDestroy()
      ti.stop()
    end
  end)


  tickexit=0
  function onKeyDown(code,event)
    if string.find(tostring(event),"KEYCODE_BACK") ~= nil then
      if tickexit+3 > tonumber(os.time()) then
        activity.finish()
       else
        TOASTTXT("Press Back Again To Exit App")
        tickexit=tonumber(os.time())
      end
      return true
    end
  end


  local L0_1
  L0_1 = {
    LinearLayout,
    {
      CardView,
      radius = "10",
      layout_width = "wrap",
      layout_marginRight = "30dp",
      backgroundColor = "0xFFFFFFFF",
      layout_marginTop = "25dp",
      layout_height = "wrap",
      layout_marginBottom = "25dp",
      layout_marginLeft = "30dp",
      {
        LinearLayout,
        orientation = "horizontal",
        layout_width = "match_parent",
        layout_height = "match_parent",
        gravity = "center",
        {
          TextView,
          id = "toasttxt",
          textColor = "0xFF000000",
          layout_width = "match_parent",
          layout_height = "wrap_content",
          padding = "10dp",
          gravity = "center"
        }
      }
    }
  }
  L0_1.orientation = "vertical"
  L0_1.layout_width = "fill"
  L0_1.layout_height = "wrap"
  sankycustomtoast = L0_1
  function L0_1(A0_2)
    toast = Toast.makeText(activity, "", Toast.LENGTH_SHORT).setView(loadlayout(sankycustomtoast)).show()
    toasttxt.setText(A0_2)
  end
  TOASTTXT = L0_1



LAYOUTVIP={


  LinearLayout;
  backgroundColor="0xFF202428";
  layout_width="fill";
  orientation="vertical";
  layout_height="fill";

  {
    LinearLayout;
    layout_height="10dp";
    layout_width="wrap";
  };

  {
    TextView;
    id="titlelogin";
    text="WELCOME";
    padding="8dp";
    textSize="40sp";
    layout_gravity="center";
    textColor="0xFFFFFFFF";
    gravity="center";
  };

  {
    LinearLayout;
    layout_height="30dp";
    gravity="center";
    layout_width="wrap";
    layout_gravity="center";
  };

  {
    CardView;
    --orientation="horizontal";
    backgroundColor="0xFFFFFFFF";
    cardElevation="30dp";
    radius=50;
    layout_height="wrap";
    layout_width="85%w";
    --gravity="center";
    id="us";
    Visibility="visible";
    layout_gravity="center";
    {
      LinearLayout;
      layout_width="wrap";
      gravity="center";
      orientation="horizontal";
      layout_height="wrap";
      layout_gravity="center";

      {
        EditText;
        TextColor="0xFF000000";
        id="txtUsername";
        layout_width="80%w";
        padding="5dp";
        layout_height="40dp";
        hintTextColor="#519D9E";
        hint="Input Key";
        textSize="15sp";
        background="#00000000";
      };

    };
  };
  {
    LinearLayout;
    layout_height="10dp";
    gravity="center";
    layout_width="wrap";
  };

    {
      CheckBox;
      id="rememberme";
      text="Remember Me";
      gravity="center";
      layout_marginLeft="35dp";
      textSize="13";
      textColor="0xFFFFFFFF";
    };


  {
    LinearLayout;
    layout_height="1dp";
    gravity="center";
    layout_width="wrap";
    layout_gravity="center";
  };

  {
    LinearLayout;
    orientation="horizontal";
    layout_width="match_parent";
    layout_height="45dp";
    layout_marginLeft="80dp";
    layout_marginRight="80dp";
    {
      CardView;
      backgroundColor="0xFF008EFF";
      layout_margin="5dp";
      layout_height="match_parent";
      id="btnLogin";
      CardElevation="30dp";
      layout_width="50dp";
      radius=10;
      layout_weight="1";
      layout_gravity="center";
      {
        LinearLayout;
        backgroundColor="0x00000000";
        layout_width="match_parent";
        orientation="horizontal";
        layout_height="match_parent";
        gravity="center";
        layout_gravity="center";
        {
          TextView;
          text="LOGIN";
          textSize="20sp";
          textColor="0xFFFFFFFF";
          layout_gravity="center";
        };
      };
    };
  };
};




activity.setContentView(loadlayout(LAYOUTVIP))


function Waterdropanimation(Controls,time)
  import "android.animation.ObjectAnimator"
  ObjectAnimator().ofFloat(Controls,"scaleX",{1,.8,1.3,.9,1}).setDuration(time).start()
  ObjectAnimator().ofFloat(Controls,"scaleY",{1,.8,1.3,.9,1}).setDuration(time).start()
end


function CircleButton(view,InsideColor,radiu,InsideColor1)
  import "android.graphics.drawable.GradientDrawable"
  drawable = GradientDrawable()
  drawable.setShape(GradientDrawable.RECTANGLE)
  drawable.setCornerRadii({radiu, radiu, radiu, radiu, radiu, radiu, radiu, radiu})
  drawable.setColor(InsideColor)
  drawable.setStroke(2, InsideColor1)
  view.setBackgroundDrawable(drawable)
end




import "android.view.animation.AlphaAnimation"
Alpha=AlphaAnimation(0,1)
Alpha.setDuration(800)







function proggresmod()
  P_layout={
    LinearLayout;
    layout_height="fill";
    layout_width="fill";
    orientation="horizontal";
    gravity="center";
    {
      LinearLayout;
      orientation="vertical";
      layout_height="fill";
      layout_width="fill";
      gravity="center";
      layout_gravity="center";
      {
        ProgressBar;
        layout_gravity="center";
        layout_width="70dp";
        style="?android:attr/progressBarStyleLarge";
        layout_height="70dp";
        layout_margin="5dp";
      };
      {
        TextView;
        id="",
        text="Please Wait",
        layout_width="fill";
        layout_gravity="center";
        textColor="0xFFFFFFFF";
        gravity="center";
      };
    };
  };

  local D=AlertDialog.Builder(this)
  D.setView(loadlayout(P_layout))
  D.setCancelable(false)
  X=D.show()
  import "android.graphics.drawable.GradientDrawable"
  local radiu=0
  X.getWindow().setBackgroundDrawable(GradientDrawable().setCornerRadii({radiu,radiu,radiu,radiu,radiu,radiu,radiu,radiu}).setColor(0x00000000))
end



local pref = activity.getSharedPreferences("x_hannya", Context.MODE_PRIVATE)
username = pref.getString("username", "")
txtUsername.setTypeface(Typeface.MONOSPACE)

remember = pref.getString("rememberme", "")
if remember == "true" then
  txtUsername.setText(username)
  rememberme.setChecked(true)
 else
  rememberme.setChecked(false)
end


function rememberme.OnCheckedChangeListener()
  if rememberme.checked then
    local pref = activity.getSharedPreferences("x_hannya", Context.MODE_PRIVATE)
    local save = pref.edit()
    save.putString("rememberme", "true")
    save.commit()
   else
    local pref = activity.getSharedPreferences("x_hannya", Context.MODE_PRIVATE)
    local save = pref.edit()
    save.putString("rememberme", "false")
    save.commit()
  end
end


function LoginExpired()
  function Exp1()
    local D1 = AlertDialog.Builder(this)
    D1.setTitle("        APPLICATION EXPIRED")
    D1.setMessage("PLEASE CONTACT DEVELOPER TO GET UPDATE !!\n\nᴅᴏɴ'ᴛ ᴛʀʏ ᴛᴏ ᴄʜᴀɴɢᴇ ʏᴏᴜʀ ᴛɪᴍᴇ ᴀɴᴅ ᴅᴀᴛᴇ シ︎")
    D1.setCancelable(false)
    D1.setPositiveButton(" EXIT ",{onClick=function(v)
        activity.finish()
      end})
    SANKY1=D1.show()
  end


  function Exp2()
    local D2 = AlertDialog.Builder(this)
    D2.setTitle("   FAILED TO BYPASS EXPIRED")
    D2.setMessage("ɪ sᴀɪᴅ ᴅᴏɴ'ᴛ ᴛʀʏ ᴛᴏ ᴄʜᴀɴɢᴇ ʏᴏᴜʀ ᴛɪᴍᴇ ᴀɴᴅ ᴅᴀᴛᴇ, ʙᴇᴄᴀᴜsᴇ ᴛʜᴀᴛ ᴅᴏᴇsɴ'ᴛ ᴡᴏʀᴋ ᴀɴʏᴍᴏʀᴇ シ︎\n\n              FUCK YOU BITCH !!!")
    D2.setCancelable(false)
    D2.setPositiveButton(" EXIT ",{onClick=function(v)
        activity.finish()
      end})
    SANKY2=D2.show()
  end

  Exp1()
  Exp2()

  function expired()
    Date1 = "20210731"--Expired Date
    Date2 = "%Y%m%d"--Will be show if the date has changed to less than the current date set.
    Date3 = "20210729"--Current Date
    date = os.date("%Y%m%d")
    --------DATE1
    if date >= Date1 then
      SANKY2.dismiss()
     else
      --------DATE2
      if date >= Date2 then
        SANKY1.dismiss()
      end
      --------DATE3
      if date >= Date3 then
        SANKY1.dismiss()
        SANKY2.dismiss()
      end
    end
  end
  expired()
end





function btnLogin.onClick()
  Waterdropanimation(btnLogin,20)
  local username = txtUsername.text
  if username =="" then
    TOASTTXT("ENTER KEY")
   else
    local pref = activity.getSharedPreferences("x_hannya", Context.MODE_PRIVATE)
    local save = pref.edit()
    save.putString("username",username)
    save.putString("password",password)
    save.commit()
    proggresmod()
    urla="https://raw.githubusercontent.com/missfangg/X-HANNYA/main/PATCHER/key.php"
    Http.get(urla,nil,function(code,content)
      X.dismiss()
      AP=content:match("【S】(.-)【S】")
      if AP== txtUsername.text then
        LoginExpired()
        main2()
       else
        TOASTTXT("INVALID KEY")
      end
    end)
  end
end





titlelogin.setTypeface(Typeface.DEFAULT_BOLD)
us.setVisibility(LinearLayout.VISIBLE)
btnLogin.setVisibility(LinearLayout.VISIBLE)
rememberme.setVisibility(LinearLayout.VISIBLE)



function main2()
  require "import"
  import "android.app.*"
  import "android.os.*"
  import "android.widget.*"
  import "android.view.*"
  import "android.graphics.drawable.BitmapDrawable"
  import "android.graphics.PorterDuff"
  import "android.graphics.PorterDuffColorFilter"
  import "android.content.Context"
  import "android.content.Intent"
  import "android.net.Uri"
  import "android.provider.Settings"
  import "com.androlua.util.RootUtil"
  import "android.graphics.Typeface"
  local RootUtil=RootUtil()



  if Settings.canDrawOverlays(activity) then else intent = Intent(Settings.ACTION_APPLICATION_DETAILS_SETTINGS,Uri.parse("package:".. activity.getPackageName()))
    intent.setData(Uri.parse("package:" .. this.getPackageName())); this.startActivity(intent);
    TOASTTXT("Application Require Permission")
  end

  os.execute("mkdir /storage/emulated/0/XHP-PROJECT")
  io.open("/storage/emulated/0/XHP-PROJECT/JOIN TELEGRAM @xhp_project", "w+")
  io.open("/storage/emulated/0/.X-HANNYA", "w+")


  layout={
    LinearLayout;
    orientation="vertical";
    gravity="center";
    backgroundColor="0xFF000000";
    layout_width="fill";
    layout_height="fill";

    {
      LinearLayout;
      layout_height="30dp";
    };


    {
      LinearLayout;
      orientation="vertical";
      layout_width="fill";
      layout_height="10%h";
      gravity="center";

      {
        TextView;
        text="XHP - PROJECT";
        textSize="20sp";
        textColor="0xFFFFFFFF";
        id="";
        gravity="center";
      };
      {
        TextView;
        id="";
        layout_margin="1dp";
        layout_width="fill";
        text="App Version 1.1 | Beta Project";
        layout_height="wrap";
        textSize="15sp";
        gravity="center";
        textColor="0xFFFFFFFF";
      };
    };

    {
      LinearLayout;
      layout_height="5dp";
    };

    {
      CardView;
      id="info";
      layout_width="fill";
      layout_height="wrap";
      backgroundColor="0xFF202428";
      layout_gravity="center";
      layout_marginLeft="10dp";
      layout_marginRight="10dp";
      layout_margin="5dp";
      radius=20;
      cardElevation="5dp";
      {
        LinearLayout;
        layout_width="match_parent";
        backgroundColor="0x00000000";
        orientation="vertical";
        layout_height="wrap";
        gravity="center";
        padding="5dp";
        {
          LinearLayout;
          layout_width="match_parent";
          layout_height="1";
        };

        {
          LinearLayout;
          layout_width="match_parent";
          backgroundColor="0x00000000";
          orientation="horizontal";
          layout_height="wrap";
          gravity="left";
          layout_marginLeft="5dp";
          layout_margin="3dp";
          {
            ImageView;
            colorFilter="0xFFFFFFFF";
            src="res/mode.png";
            layout_gravity="center";
            layout_width="20dp";
            layout_height="20dp";
            padding="1dp";
          };
          {
            TextView;
            text=" MODE";
            layout_width="25%w";
            id="";
            gravity="left|center";
            layout_gravity="center";
            layout_height="wrap";
            textSize="12sp";
            textColor="0xFFFFFFFF";
          };
          {
            TextView;
            text="  : ";
            layout_width="wrap";
            layout_height="wrap";
            textSize="12sp";
            layout_gravity="center";
            textColor="0xFFFFFFFF";
          };

          {
            TextView;
            text="";
            layout_width="wrap";
            id="status";
            layout_marginLeft="5dp";
            gravity="center";
            layout_gravity="center";
            layout_height="wrap";
            textSize="12sp";
            textColor="0xFFFFFFFF";
          };
        };



        {
          LinearLayout;
          layout_width="match_parent";
          backgroundColor="0x00000000";
          orientation="horizontal";
          layout_height="wrap";
          gravity="left";
          layout_marginLeft="5dp";
          layout_margin="3dp";
          {
            ImageView;
            colorFilter="0xFFFFFFFF";
            src="res/expired.png";
            layout_gravity="center";
            layout_width="20dp";
            layout_height="20dp";
            padding="1dp";
          };
          {
            TextView;
            text=" EXPIRED";
            layout_width="25%w";
            id="";
            gravity="left|center";
            layout_gravity="center";
            layout_height="wrap";
            textSize="12sp";
            textColor="0xFFFFFFFF";
          };
          {
            TextView;
            text="  : ";
            layout_width="wrap";
            layout_height="wrap";
            textSize="12sp";
            layout_gravity="center";
            textColor="0xFFFFFFFF";
          };
          {
            TextView;
            text="";
            layout_width="wrap";
            id="author";
            layout_marginLeft="5dp";
            gravity="center";
            layout_gravity="center";
            layout_height="wrap";
            textSize="12sp";
            textColor="0xFFFFFFFF";
          };
        };
        {
          LinearLayout;
          layout_width="match_parent";
          backgroundColor="0x00000000";
          orientation="horizontal";
          layout_height="wrap";
          gravity="left";
          layout_marginLeft="5dp";
          layout_margin="3dp";
          {
            ImageView;
            colorFilter="0xFFFFFFFF";
            src="res/device.png";
            layout_gravity="center";
            layout_width="20dp";
            layout_height="20dp";
            padding="1dp";
          };
          {
            TextView;
            text=" DEVICE";
            layout_width="25%w";
            id="";
            gravity="left|center";
            layout_gravity="center";
            layout_height="wrap";
            textSize="12sp";
            textColor="0xFFFFFFFF";
          };
          {
            TextView;
            text="  : ";
            layout_width="wrap";
            layout_height="wrap";
            textSize="12sp";
            layout_gravity="center";
            textColor="0xFFFFFFFF";
          };
          {
            TextView;
            text="";
            layout_width="wrap";
            id="model";
            layout_marginLeft="5dp";
            gravity="center";
            layout_gravity="center";
            layout_height="wrap";
            textSize="12sp";
            textColor="0xFFFFFFFF";
          };
        };

        {
          LinearLayout;
          layout_width="match_parent";
          backgroundColor="0x00000000";
          orientation="horizontal";
          layout_height="wrap";
          gravity="left";
          layout_marginLeft="5dp";
          layout_margin="3dp";
          {
            ImageView;
            colorFilter="0xFFFFFFFF";
            src="res/android.png";
            layout_gravity="center";
            layout_width="20dp";
            layout_height="20dp";
            padding="1dp";
          };
          {
            TextView;
            text=" ANDROID";
            layout_width="25%w";
            id="";
            gravity="left|center";
            layout_gravity="center";
            layout_height="wrap";
            textSize="12sp";
            textColor="0xFFFFFFFF";
          };
          {
            TextView;
            text="  : ";
            layout_width="wrap";
            layout_height="wrap";
            textSize="12sp";
            layout_gravity="center";
            textColor="0xFFFFFFFF";
          };
          {
            TextView;
            text="";
            layout_width="wrap";
            id="android";
            layout_marginLeft="5dp";
            gravity="center";
            layout_gravity="center";
            layout_height="wrap";
            textSize="12sp";
            textColor="0xFFFFFFFF";
          };
        };

        {
          LinearLayout;
          layout_width="match_parent";
          backgroundColor="0x00000000";
          orientation="horizontal";
          layout_height="wrap";
          gravity="left";
          layout_marginLeft="5dp";
          layout_margin="3dp";
          {
            ImageView;
            colorFilter="0xFFFFFFFF";
            src="res/sdk.png";
            layout_gravity="center";
            layout_width="20dp";
            layout_height="20dp";
            padding="1dp";
          };
          {
            TextView;
            text=" SDK";
            layout_width="25%w";
            id="";
            gravity="left|center";
            layout_gravity="center";
            layout_height="wrap";
            textSize="12sp";
            textColor="0xFFFFFFFF";
          };
          {
            TextView;
            text="  : ";
            layout_width="wrap";
            layout_height="wrap";
            textSize="12sp";
            layout_gravity="center";
            textColor="0xFFFFFFFF";
          };
          {
            TextView;
            text="";
            layout_width="wrap";
            id="sdk";
            layout_marginLeft="5dp";
            gravity="center";
            layout_gravity="center";
            layout_height="wrap";
            textSize="12sp";
            textColor="0xFFFFFFFF";
          };
        };

      };
    };

    {
      LinearLayout;
      orientation="horizontal";
      layout_width="match_parent";
      layout_height="80dp";
      layout_marginLeft="5dp";
      layout_marginRight="5dp";
      {
        CardView;
        backgroundColor="0xFFFF0000";
        layout_margin="5dp";
        layout_height="match_parent";
        id="start";
        CardElevation="3dp";
        layout_width="60dp";
        radius=10;
        layout_weight="1";
        layout_gravity="center";
        {
          LinearLayout;
          backgroundColor="0x00000000";
          layout_width="match_parent";
          orientation="horizontal";
          layout_height="match_parent";
          gravity="center";
          layout_gravity="center";
          {
            ImageView;
            colorFilter="0xFFFFFFFF";
            src="res/start.png";
            layout_margin="5dp";
            layout_gravity="center";
            layout_width="25dp";
            layout_height="25dp";
            id="startid";
          };
          {
            TextView;
            textColor="0xFFFFFFFF";
            layout_gravity="center";
            textSize="15sp";
            text="START CHEAT";
          };
        };
      };
      {
        CardView;
        backgroundColor="0xFFFF4C4C";
        layout_margin="5dp";
        layout_height="match_parent";
        id="stop";
        CardElevation="3dp";
        layout_width="60dp";
        radius=10;
        layout_weight="1";
        layout_gravity="center";
        {
          LinearLayout;
          backgroundColor="0x00000000";
          layout_width="match_parent";
          orientation="horizontal";
          layout_height="match_parent";
          gravity="center";
          layout_gravity="center";
          {
            ImageView;
            colorFilter="0xFFFFFFFF";
            src="res/stop.png";
            layout_margin="5dp";
            layout_gravity="center";
            layout_width="25dp";
            layout_height="25dp";
            id="stopid";
          };
          {
            TextView;
            textColor="0xFFFFFFFF";
            layout_gravity="center";
            textSize="15sp";
            text="STOP CHEAT";
          };
        };
      };
    };
    {
      LinearLayout;
      layout_height="0dp";
    };
    {
      CardView;
      id="play";
      layout_width="fill";
      layout_height="50dp";
      backgroundColor="0xFF008EFF";
      layout_marginLeft="10dp";
      layout_marginRight="10dp";
      radius="3dp";
      cardElevation="0dp";
      {
        LinearLayout;
        layout_width="match_parent";
        backgroundColor="0x00000000";
        orientation="horizontal";
        layout_height="wrap";
        gravity="center";
        layout_gravity="center";
        id="playid";
        {
          TextView;
          text="STARTGAME";
          layout_width="wrap";
          gravity="center";
          layout_gravity="center";
          layout_height="wrap";
          textSize="20sp";
          textColor="0xFFFFFFFF";
        };
      };
    };


    {
      LinearLayout;
      layout_height="10dp";
    };

    {
      LinearLayout;
      layout_width="fill";
      layout_height="wrap";
      Visibility="visible";
      layout_gravity="center";
      backgroundColor="0x00000000";
      id="telegram";
      {
        LinearLayout;
        layout_width="wrap";
        gravity="center";
        orientation="horizontal";
        layout_height="wrap";
        layout_gravity="center";
        {
          ImageView;
          src="res/telegram.png";
          padding="10dp";
          layout_height="40dp";
          layout_width="40dp";
          colorFilter="0xFFFFFFFF";
          layout_gravity="center";
        };
        {
          TextView;
          TextColor="0xFFFFFFFF";
          textSize="15sp";
          text="TELEGRAM";
          id="";
          layout_width="70%w";
          layout_height="40dp";
          gravity="center|left";
          layout_gravity="center";
          padding="5dp";
        };
        {
          ImageView;
          src="res/arrow.png";
          padding="10dp";
          layout_height="32dp";
          layout_width="32dp";
          colorFilter="0xFFFFFFFF";
          layout_gravity="center";
        };
      };
    };


    {
      LinearLayout;
      layout_width="fill";
      layout_height="wrap";
      Visibility="visible";
      layout_gravity="center";
      backgroundColor="0x00000000";
      id="youtube";
      {
        LinearLayout;
        layout_width="wrap";
        gravity="center";
        orientation="horizontal";
        layout_height="wrap";
        layout_gravity="center";
        {
          ImageView;
          src="res/youtube.png";
          padding="10dp";
          layout_height="40dp";
          layout_width="40dp";
          colorFilter="0xFFFFFFFF";
          layout_gravity="center";
        };
        {
          TextView;
          TextColor="0xFFFFFFFF";
          textSize="15sp";
          text="YOUTUBE";
          id="";
          layout_width="70%w";
          layout_height="40dp";
          gravity="center|left";
          layout_gravity="center";
          padding="5dp";
        };
        {
          ImageView;
          src="res/arrow.png";
          padding="10dp";
          layout_height="32dp";
          layout_width="32dp";
          colorFilter="0xFFFFFFFF";
          layout_gravity="center";
        };
      };
    };


    {
      LinearLayout;
      layout_width="fill";
      layout_height="wrap";
      Visibility="visible";
      layout_gravity="center";
      backgroundColor="0x00000000";
      id="exit";
      {
        LinearLayout;
        layout_width="wrap";
        gravity="center";
        orientation="horizontal";
        layout_height="wrap";
        layout_gravity="center";
        {
          ImageView;
          src="res/exit.png";
          padding="10dp";
          layout_height="40dp";
          layout_width="40dp";
          colorFilter="0xFFFFFFFF";
          layout_gravity="center";
        };
        {
          TextView;
          TextColor="0xFFFFFFFF";
          textSize="15sp";
          text="EXIT";
          id="";
          layout_width="70%w";
          layout_height="40dp";
          gravity="center|left";
          layout_gravity="center";
          padding="5dp";
        };
      };
    };




    {
      LinearLayout;
      layout_gravity="center";
      layout_width="fill";
      Orientation="vertical";
      gravity="center|bottom";
      layout_height="fill";
    };
  };

  floating={
    LinearLayout,
    layout_width="fill",
    layout_height="fill",
    background="transparent",
    orientation="vertical";
    {
      CardView,
      radius=20;
      layout_width="fill",
      layout_height="wrap",
      backgroundColor="0xFFFF0000",
      CardElevation="0dp",
      layout_gravity="center";
      id="menufloating";
      {
        LinearLayout;
        orientation="vertical";
        layout_width="fill",
        layout_height="fill",
        gravity="center";
        {
          CardView,
          radius=0;
          layout_width="fill",
          layout_height="30dp",
          backgroundColor="0xFFFF0000",
          CardElevation="0dp",
          layout_gravity="center";
          id="fl";
          {
            LinearLayout;
            layout_height="wrap";
            layout_width="fill";
            orientation="horizontal";
            layout_gravity="center";
            padding="5dp";
            {
              LinearLayout;
              layout_height="wrap";
              layout_width="fill";
              orientation="vertical";
              layout_gravity="center";
              {
                LinearLayout;
                layout_height="wrap";
                layout_width="fill";
                orientation="vertical";
                layout_gravity="center";
                {
                  TextView,
                  typeface=Typeface.DEFAULT_BOLD,
                  layout_width="wrap",
                  layout_height="wrap",
                  layout_gravity="center",
                  textColor="0xFFFFFFFF",
                  textSize="16sp",
                  Gravity="center",
                  layout_gravity="center";
                  text="XHP - PROJECT",
                  id="t2",
                },
              };
            };
          };

          {
            LinearLayout;
            orientation="horizontal";
            layout_height="fill";
            layout_width="fill";
            gravity="right";
            background="transparent",

            {
              ImageView;
              layout_width="35dp";
              layout_height="35dp";
              src="res/close.png";
              colorFilter="0xFFFFFFFF";
              layout_gravity="center";
              padding="2dp";
              id="t1";
            };
          };
        };

        {
          CardView,
          radius=20;
          layout_width="fill",
          layout_height="wrap",
          backgroundColor="0xFF202125",
          CardElevation="0dp",
          layout_gravity="center";
          layout_margin="5dp";
          id="";
          {
            LinearLayout;
            orientation="vertical";
            layout_width="fill",
            layout_height="fill",
            gravity="center";
            {
              LinearLayout;
              orientation="vertical";
              padding="5";
              {
                ScrollView;
                layout_width="fill_parent";
                layout_height="fill",
                layout_gravity="center_horizontal";
                id="";
                {
                  LinearLayout,
                  id="win_mainviewX",
                  layout_width="fill",
                  layout_height="fill";
                  backgroundColor="0x00000000";
                  gravity="center";
                  Visibility="visible";
                  padding="3dp";
                  {
                    LinearLayout;
                    orientation="vertical";
                    {
                      CardView,
                      id="win_mainview",
                      layout_width="75%w",
                      layout_height="fill";
                      backgroundColor="0x00000000",
                      CardElevation="0dp",
                      layout_gravity="center";
                      radius="0";
                      {
                        LinearLayout;
                        orientation="vertical";
                        layout_width="fill_parent";
                        background="transparent",
                        {
                          LinearLayout;
                          layout_width="fill_parent";
                          background="transparent";
                        };


                        {
                          LinearLayout;
                          layout_width="fill";
                          layout_height="fill",
                          orientation="vertical";
                          id="menu1";
                          visibility="visible";
                          {
                            ScrollView;
                            layout_width="fill";
                            layout_height="fill",
                            layout_gravity="center_horizontal";
                            id="";
                            {
                              LinearLayout;
                              layout_height="fill";
                              layout_width="fill";
                              orientation="vertical";
                              {
                                LinearLayout;
                                orientation="vertical";
                                layout_height="fill";
                                layout_width="fill";
                              };

                              {
                                Switch;
                                text="• ANTIBAN [ LOBBY ]";
                                textColor="0xFFFFFFFF";
                                id="antiban";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };
                              {
                                Switch;
                                text="• ESP LOCK HERO";
                                textColor="0xFFFFFFFF";
                                id="esplock";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };
                              {
                                Switch;
                                text="• RADAR MAP ICON";
                                textColor="0xFFFFFFFF";
                                id="radarmapicon";
                                textSize="12sp";
                                layout_gravity="center";
                                layout_width="fill";
                                layout_height="wrap";
                              };


                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };
                              {
                                Switch;
                                text="• RADAR MAP NO ICON";
                                textColor="0xFFFFFFFF";
                                id="radarmap";
                                textSize="12sp";
                                layout_gravity="center";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };

                              {
                                Switch;
                                text="• VISIBLE IN GRASS";
                                textColor="0xFFFFFFFF";
                                id="fixgrass";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };

                              {
                                Switch;
                                text="• REMOVE GRASS";
                                textColor="0xFFFFFFFF";
                                id="removegrass";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };

                              {
                                Switch;
                                text="• HIDE NICKNAME";
                                textColor="0xFFFFFFFF";
                                id="hidename";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };

                              {
                                Switch;
                                text="• MAX EMBLEMS";
                                textColor="0xFFFFFFFF";
                                id="emblem";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };
                              {
                                Switch;
                                text="• QUICK CHAT NO COOLDOWN";
                                textColor="0xFFFFFFFF";
                                id="spamchat";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout,
                                layout_height = "0.4%h",
                                layout_width = "fill"
                              },
                              {
                                LinearLayout,
                                layout_width = "fill",
                                layout_height = "wrap",
                                id = " title1 ";
                                gravity = "center_horizontal",
                                backgroundColor = "0xFFFF0000",
                                {
                                  TextView;
                                  text="CAMERA VIEW";
                                  textColor="0xFFFFFFFF";
                                  id="";
                                  layout_gravity="center";
                                  textSize="16sp";
                                  layout_width="wrap";
                                  layout_height="wrap";
                                }
                              };
                              {
                                LinearLayout,
                                layout_height = "0.5%h",
                                layout_width = "fill"
                              },

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };


                              {
                                TextView;
                                id="text";
                                layout_width="wrap_content";
                                layout_height="wrap_content";
                                text="• VERTICAL 0 X";
                                textColor="0xFFFFFFFF";
                                textSize="12sp";
                              };
                              {
                                CardView;
                                layout_width = "fill",
                                radius="20";
                                layout_height = "wrap",
                                layout_gravity = "center",
                                backgroundColor = "0xFF202428",
                                {
                                  SeekBar;
                                  id="droneviewtop";
                                  layout_width="match_parent";
                                  layout_height="wrap_content";
                                  max="10";
                                  progress="0";
                                };
                              };




                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="10dp";
                              };

                              {
                                TextView;
                                id="text2";
                                layout_width="wrap_content";
                                layout_height="wrap_content";
                                text="• HORIZONTAL 0 X";
                                textColor="0xFFFFFFFF";
                                textSize="12sp";
                              };

                              {
                                CardView;
                                layout_width = "fill",
                                radius="20";
                                layout_height = "wrap",
                                layout_gravity = "center",
                                backgroundColor = "0xFF202428",

                                {
                                  SeekBar;
                                  id="droneviewside";
                                  layout_width="match_parent";
                                  layout_height="wrap_content";
                                  max="10";
                                  progress="0";
                                };
                              };
                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };


                              {
                                LinearLayout,
                                layout_height = "0.5%h",
                                layout_width = "fill"
                              },

                              {
                                LinearLayout,
                                layout_height = "0.4%h",
                                layout_width = "fill"
                              },
                              {
                                LinearLayout,
                                layout_width = "fill",
                                layout_height = "wrap",
                                id = " title1 ";
                                gravity = "center_horizontal",
                                backgroundColor = "0xFFFF0000",
                                {
                                  TextView;
                                  text="CUSTOM";
                                  textColor="0xFFFFFFFF";
                                  id="";
                                  layout_gravity="center";
                                  textSize="16sp";
                                  layout_width="wrap";
                                  layout_height="wrap";
                                }
                              };
                              {
                                LinearLayout,
                                layout_height = "0.5%h",
                                layout_width = "fill"
                              },

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };

                              {
                                Switch;
                                text="• UNLOCK ALL SKIN";
                                textColor="0xFFFFFFFF";
                                id="unlockskin";
                                textSize="12sp";
                                layout_gravity="center";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };

                              {
                                Switch;
                                text="• ATTACK SPEED";
                                textColor="0xFFFFFFFF";
                                id="attackspeed";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };


                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };

                              {
                                Switch;
                                text="• WALLHACK";
                                textColor="0xFFFFFFFF";
                                id="wallhack";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };

                              {
                                Switch;
                                text="• NO SPAWN";
                                textColor="0xFFFFFFFF";
                                id="autospawn";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout;
                                layout_width="wrap";
                                layout_height="3dp";
                              };
                              {
                                Switch;
                                text="• SPELL & SKILL NO COOLDOWN";
                                textColor="0xFFFFFFFF";
                                id="skillnocd";
                                layout_gravity="center";
                                textSize="12sp";
                                layout_width="fill";
                                layout_height="wrap";
                              };

                              {
                                LinearLayout,
                                layout_height = "0.5%h",
                                layout_width = "fill"

                              },
                              {
                                ToggleButton,
                                textSize="11sp";
                                layout_grafity="center";
                                text = "UNLOCK HERO",
                                layout_height = "32dp",
                                textOn = "UNLOCK HERO",
                                id = "hero",
                                textColor = "0xFFFFFFFF",
                                textOff = "UNLOCK HERO",
                                layout_width = "fill"
                              };
                              {
                                LinearLayout,
                                layout_height = "0.5%h",
                                layout_width = "fill"
                              },
                              {
                                ToggleButton,
                                textSize="11sp";
                                layout_grafity="center";
                                text = "CLEAR CACHE & LOGS",
                                layout_height = "32dp",
                                textOn = "CLEAR CACHE & LOGS",
                                id = "logs",
                                textColor = "0xFFFFFFFF",
                                textOff = "CLEAR CACHE & LOGS",
                                layout_width = "fill"
                              };
                            };
                          };
                        };
                      };
                    };
                  };
                };
              };
            };
          };
        };
      };
    };
  };

  icon={
    LinearLayout;
    layout_height="fill";
    layout_width="fill";
    id="iconfloating";
    {
      CardView,
      layout_width="fill",
      layout_height="fill";
      backgroundColor="0x00FFFFFF";
      CardElevation="5dp",
      radius="50";
      id="iconf";
      {
        ImageView;
        layout_height="45dp";
        layout_width="45dp";
        src="res/iconf.png";
        id="Win_minWindow";
        padding="3dp";
        colorFilter="#090707";
      };
    };
  };



  activity.setTheme(R.AndLua6)
  activity.overridePendingTransition(android.R.anim.fade_in,android.R.anim.fade_out)
  --activity.getWindow().addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS).setStatusBarColor(0xFF000000);
  activity.getWindow().addFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
  activity.setContentView(loadlayout(layout))
  activity.ActionBar.hide()

  function Waterdropanimation(Controls,time)
    import "android.animation.ObjectAnimator"
    ObjectAnimator().ofFloat(Controls,"scaleX",{1,.8,1.3,.9,1}).setDuration(time).start()
    ObjectAnimator().ofFloat(Controls,"scaleY",{1,.8,1.3,.9,1}).setDuration(time).start()
  end

  function CircleButton(view,InsideColor,radiu,InsideColor1)
    import "android.graphics.drawable.GradientDrawable"
    drawable = GradientDrawable()
    drawable.setShape(GradientDrawable.RECTANGLE)
    drawable.setCornerRadii({radiu, radiu, radiu, radiu, radiu, radiu, radiu, radiu})
    drawable.setColor(InsideColor)
    drawable.setStroke(3, InsideColor1)
    view.setBackgroundDrawable(drawable)
  end

  function run()
    dd = tonumber("31") - tonumber(os.date("%d"))
    hh=tonumber("24") - tonumber(os.date("%H"))
    mm=tonumber("60") - tonumber(os.date("%M"))
    day= tostring(dd)
    hour= tostring(hh)
    minute= tostring(mm)
    author.setText(os.date(dd .. " Days " .. hh .. " Hours " .. mm .. " Mins "))
  end
  function te()
    run()
  end
  function Refresh()
    require("import")
    while true do
      Thread.sleep(500)
      call("te")
    end
  end
  thread(Refresh)




  model.setText(""..Build.MODEL)
  android.setText(""..Build.VERSION.RELEASE)
  sdk.setText(""..Build.VERSION.SDK)

  task(50,function()
    status.setVisibility(View.VISIBLE)
    if RootUtil.haveRoot()==true then
      status.Text="ROOTED";
      status.textColor=0xFFFFFFFF
      --root.setChecked(true)
     else
      status.Text="VIRTUAL";
      status.textColor=0xFFFFFFFF
      --noroot.setChecked(true)
    end
  end)




  LayoutVIP=activity.getSystemService(Context.WINDOW_SERVICE)
  HasFocus=false
  A3params =WindowManager.LayoutParams()
  if Build.VERSION.SDK_INT >= 26 then A3params.type =WindowManager.LayoutParams.TYPE_APPLICATION_OVERLAY
   else A3params.type =WindowManager.LayoutParams.TYPE_SYSTEM_ALERT
  end
  import "android.graphics.PixelFormat"
  A3params.format =PixelFormat.RGBA_8888
  A3params.x = 0
  A3params.y = 0
  A3params.flags=WindowManager.LayoutParams().FLAG_NOT_FOCUSABLE
  A3params.gravity = Gravity.CENTER | Gravity.CENTER
  A3params.width = WindowManager.LayoutParams.WRAP_CONTENT
  A3params.height = WindowManager.LayoutParams.WRAP_CONTENT
  mainWindow = loadlayout(floating)
  isMax=false


  LayoutVIP1=activity.getSystemService(Context.WINDOW_SERVICE)
  HasFocus=false
  A3params1 =WindowManager.LayoutParams()
  if Build.VERSION.SDK_INT >= 26 then A3params1.type =WindowManager.LayoutParams.TYPE_APPLICATION_OVERLAY
   else A3params1.type =WindowManager.LayoutParams.TYPE_SYSTEM_ALERT
  end
  import "android.graphics.PixelFormat"
  A3params1.format =PixelFormat.RGBA_8888
  A3params1.x = 0
  A3params1.y = 100
  A3params1.flags=WindowManager.LayoutParams().FLAG_NOT_FOCUSABLE
  A3params1.gravity = Gravity.CENTER | Gravity.CENTER
  A3params1.width = WindowManager.LayoutParams.WRAP_CONTENT
  A3params1.height = WindowManager.LayoutParams.WRAP_CONTENT
  minWindow = loadlayout(icon)
  OpenM=false
  ----
  function Win_minWindow.OnTouchListener(v,event)
    if OpenM==false then
      if event.getAction()==MotionEvent.ACTION_DOWN then
        firstX=event.getRawX()
        firstY=event.getRawY()
        wmX=A3params1.x
        wmY=A3params1.y
       elseif event.getAction()==MotionEvent.ACTION_MOVE then
        A3params1.x=wmX+(event.getRawX()-firstX)
        A3params1.y=wmY+(event.getRawY()-firstY)
        LayoutVIP1.updateViewLayout(minWindow,A3params1)
       elseif event.getAction()==MotionEvent.ACTION_UP then
       else
      end
    end return false end


  function fl.OnTouchListener(v,event)
    if event.getAction()==MotionEvent.ACTION_DOWN then
      firstX=event.getRawX()
      firstY=event.getRawY()
      wmX=A3params.x
      wmY=A3params.y
     elseif event.getAction()==MotionEvent.ACTION_MOVE then
      A3params.x=wmX+(event.getRawX()-firstX)
      A3params.y=wmY+(event.getRawY()-firstY)
      LayoutVIP.updateViewLayout(mainWindow,A3params)
     elseif event.getAction()==MotionEvent.ACTION_UP then
    end
    return
    true
  end

  function Win_minWindow.onClick(v)
    Waterdropanimation(Win_minWindow,50)
    if OpenM==false then
      OpenM=true
      LayoutVIP.addView(mainWindow,A3params)
      LayoutVIP1.removeView(minWindow)
    end
  end

  function t1.onClick(v)
    if OpenM==true then
      OpenM=false
      LayoutVIP.removeView(mainWindow)
      LayoutVIP1.addView(minWindow,A3params1)
    end
  end

  function t1.onLongClick(v)
    vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
    vibrator.vibrate( long{20,9} ,-5)
    if isMax==true && OpenM==true then
      isMax=false OpenM=false
      LayoutVIP.removeView(mainWindow)
    end
  end




  function start.onClick()
    Waterdropanimation(start,20)
    vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
    vibrator.vibrate( long{20,9} ,-5)
    if isMax==false then
      isMax=true
      LayoutVIP1.addView(minWindow,A3params1)
     else
      vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
      vibrator.vibrate( long{20,20} ,-5)
      TOASTTXT("CHEAT IS RUNNING !!")
    end
  end

  function stop.onClick()
    Waterdropanimation(stop,20)
    vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
    vibrator.vibrate( long{20,9} ,-5)
    if isMax==true && OpenM==true then
      isMax=false OpenM=false
      LayoutVIP.removeView(mainWindow)
     elseif isMax==true && OpenM==false then
      isMax=false
      LayoutVIP1.removeView(minWindow)
     else
      vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
      vibrator.vibrate( long{20,20} ,-5)
      TOASTTXT("CHEAT NOT RUNNING !!")
    end
  end





  function playid.onClick()
    vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
    vibrator.vibrate( long{20,9} ,-5)
    if pcall(function()
        activity.getPackageManager().getPackageInfo("com.mobile.legends", 0)
      end) then
      this.startActivity(activity.getPackageManager().getLaunchIntentForPackage("com.mobile.legends"))
     else
      viewIntent = Intent("android.intent.action.VIEW", Uri.parse("https://play.google.com/store/apps/details?id=com.mobile.legends"))
      activity.startActivity(viewIntent)
      TOASTTXT("GAME IS NOT INSTALLED")
    end
  end


  telegram.onClick=function()
    vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
    vibrator.vibrate( long{20,9} ,-5)
    url = "http://t.me/xhp_project"
    activity.startActivity(Intent(Intent.ACTION_VIEW, Uri.parse(url)))
  end

  youtube.onClick=function()
    vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
    vibrator.vibrate( long{20,9} ,-5)
    url = "https://youtube.com/channel/UCdLqzSTn88RBFeeCEH8D1RA"
    activity.startActivity(Intent(Intent.ACTION_VIEW, Uri.parse(url)))
  end

  exit.onClick=function()
    vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
    vibrator.vibrate( long{20,10} ,-5)
    activity.finish()
  end





  CircleButton(iconf,0xFFFFFFFF,75,0xFFFFFFFF)
  CircleButton(start,0x00000000,20,0xFFFFFFFF)
  CircleButton(stop,0x00000000,20,0xFFFFFFFF)
  CircleButton(play,0x00000000,20,0xFFFFFFFF)
  CircleButton(info,0xFF000000,20,0xFFFFFFFF)
  CircleButton(logs,0xFFFF0000,10,4287187697)
  CircleButton(hero,0xFFFF0000,10,4287187697)
  CircleButton(droneviewtop,0xFF202428,20,0xFFFFFFFF)
  CircleButton(droneviewside,0xFF202428,20,0xFFFFFFFF)


  --SeekBar
  droneviewtop.ProgressDrawable.setColorFilter(PorterDuffColorFilter(0xFFFF0000,PorterDuff.Mode.SRC_ATOP))
  droneviewside.ProgressDrawable.setColorFilter(PorterDuffColorFilter(0xFFFF0000,PorterDuff.Mode.SRC_ATOP))


  function Exec(CPP)
    local dir=activity.getLuaDir(CPP)
    if RootUtil().haveRoot()==true then
      thread(Refresh)
      os.execute("su -c chmod 777 "..dir)
      thread(Refresh)
      Runtime.getRuntime().exec("su -c "..dir)
      thread(Refresh)
     else
      thread(Refresh)
      os.execute("chmod 777 "..dir)
      thread(Refresh)
      Runtime.getRuntime().exec(""..dir)
      thread(Refresh)
    end
  end


  function hero.onClick()
    hero.show()
  end
  hero = PopupMenu(activity, hero)
  menu = hero.Menu

  menu.add(" • Aldous                                            ").onMenuItemClick = function()
    Exec("CPP/Aldous")
  end
  menu.add(" • Alucard                                   ").onMenuItemClick = function()
    Exec("CPP/Alucard")
  end
  menu.add(" • Atlas                                     ").onMenuItemClick = function()
    Exec("CPP/Atlas")
  end
  menu.add(" • Barats                                     ").onMenuItemClick = function()
    Exec("CPP/Barats")
  end
  menu.add(" • Beatrix                                       ").onMenuItemClick = function()
    Exec("CPP/Beatrix")
  end
  menu.add(" • Benedetta                                  ").onMenuItemClick = function()
    Exec("CPP/Benedetta")
  end
  menu.add(" • Brody                                       ").onMenuItemClick = function()
    Exec("CPP/Brody")
  end
  menu.add(" • Bruno                                      ").onMenuItemClick = function()
    Exec("CPP/Bruno")
  end
  menu.add(" • Chou                                        ").onMenuItemClick = function()
    Exec("CPP/Chou")
  end
  menu.add(" • Claude                                     ").onMenuItemClick = function()
    Exec("CPP/Claude")
  end
  menu.add(" • Clint                                      ").onMenuItemClick = function()
    Exec("CPP/Clint")
  end
  menu.add(" • Dyroth                                    ").onMenuItemClick = function()
    Exec("CPP/Dyroth")
  end
  menu.add(" • Esmeralda                                   ").onMenuItemClick = function()
    Exec("CPP/Esmeralda")
  end
  menu.add(" • Fanny                                   ").onMenuItemClick = function()
    Exec("CPP/Fanny")
  end
  menu.add(" • Freya                                   ").onMenuItemClick = function()
    Exec("CPP/Freya")
  end
  menu.add(" • Granger                                   ").onMenuItemClick = function()
    Exec("CPP/Granger")
  end
  menu.add(" • Guinevere                                   ").onMenuItemClick = function()
    Exec("CPP/Guinevere")
  end
  menu.add(" • Gusion                                   ").onMenuItemClick = function()
    Exec("CPP/Gusion")
  end
  menu.add(" • Hanabi                                   ").onMenuItemClick = function()
    Exec("CPP/Hanabi")
  end
  menu.add(" • Hanzo                                   ").onMenuItemClick = function()
    Exec("CPP/Hanzo")
  end
  menu.add(" • Harith                                  ").onMenuItemClick = function()
    Exec("CPP/Harith")
  end
  menu.add(" • Harley                                  ").onMenuItemClick = function()
    Exec("CPP/Harley")
  end
  menu.add(" • Hayabusa                              ").onMenuItemClick = function()
    Exec("CPP/Hayabusa")
  end
  menu.add(" • Helcurt                                 ").onMenuItemClick = function()
    Exec("CPP/Helcurt")
  end
  menu.add(" • Jawhead                               ").onMenuItemClick = function()
    Exec("CPP/Jawhead")
  end
  menu.add(" • Kadita                              ").onMenuItemClick = function()
    Exec("CPP/Kadita")
  end
  menu.add(" • Kagura                             ").onMenuItemClick = function()
    Exec("CPP/Kagura")
  end
  menu.add(" • Karina                            ").onMenuItemClick = function()
    Exec("CPP/Karina")
  end
  menu.add(" • Karrie                            ").onMenuItemClick = function()
    Exec("CPP/Karrie")
  end
  menu.add(" • Khaleed                            ").onMenuItemClick = function()
    Exec("CPP/Khaleed")
  end
  menu.add(" • Kimmy                            ").onMenuItemClick = function()
    Exec("CPP/Kimmy")
  end
  menu.add(" • Kufra                           ").onMenuItemClick = function()
    Exec("CPP/Kufra")
  end
  menu.add(" • Lancelot                      ").onMenuItemClick = function()
    Exec("CPP/Lancelot")
  end
  menu.add(" • Lapu Lapu                     ").onMenuItemClick = function()
    Exec("CPP/Lapu")
  end
  menu.add(" • Leomord                           ").onMenuItemClick = function()
    Exec("CPP/Leomord")
  end
  menu.add(" • Lesley                          ").onMenuItemClick = function()
    Exec("CPP/Lesley")
  end
  menu.add(" • Ling                          ").onMenuItemClick = function()
    Exec("CPP/Ling")
  end
  menu.add(" • Lunox                          ").onMenuItemClick = function()
    Exec("CPP/Lunox")
  end
  menu.add(" • Martis                         ").onMenuItemClick = function()
    Exec("CPP/Martis")
  end
  menu.add(" • Mathilda                       ").onMenuItemClick = function()
    Exec("CPP/Mathilda")
  end
  menu.add(" • Minsithar                  ").onMenuItemClick = function()
    Exec("CPP/Minsithar")
  end
  menu.add(" • Miya                      ").onMenuItemClick = function()
    Exec("CPP/Miya")
  end
  menu.add(" • Moskov                      ").onMenuItemClick = function()
    Exec("CPP/Moskov")
  end
  menu.add(" • Natalia                     ").onMenuItemClick = function()
    Exec("CPP/Natalia")
  end
  menu.add(" • Paquito                     ").onMenuItemClick = function()
    Exec("CPP/Paquito")
  end
  menu.add(" • Pharsa                    ").onMenuItemClick = function()
    Exec("CPP/Pharsa")
  end
  menu.add(" • Popol & Kupa               ").onMenuItemClick = function()
    Exec("CPP/Popol")
  end
  menu.add(" • Roger                    ").onMenuItemClick = function()
    Exec("CPP/Roger")
  end
  menu.add(" • Ruby                    ").onMenuItemClick = function()
    Exec("CPP/Ruby")
  end
  menu.add(" • Selena                   ").onMenuItemClick = function()
    Exec("CPP/Selena")
  end
  menu.add(" • Silvana                ").onMenuItemClick = function()
    Exec("CPP/Silvana")
  end
  menu.add(" • Terizla               ").onMenuItemClick = function()
    Exec("CPP/Terizla")
  end
  menu.add(" • Thamuz             ").onMenuItemClick = function()
    Exec("CPP/Thamuz")
  end
  menu.add(" • Uranus             ").onMenuItemClick = function()
    Exec("CPP/Uranus")
  end
  menu.add(" • X-Borg             ").onMenuItemClick = function()
    Exec("CPP/Xborg")
  end
  menu.add(" • Yi Sun Shin         ").onMenuItemClick = function()
    Exec("CPP/Yss")
  end
  menu.add(" • Yu Zhong          ").onMenuItemClick = function()
    Exec("CPP/Yuzhong")
  end
  menu.add(" • Yve             ").onMenuItemClick = function()
    Exec("CPP/Yve")
  end


  function radarmapicon.OnCheckedChangeListener()
    if radarmapicon.checked then
      thread(Refresh)
      Exec("CPP/Eudora 13")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
     else
      thread(Refresh)
      Exec("CPP/Eudora 14")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
    end
  end

  function attackspeed.OnCheckedChangeListener()
    if attackspeed.checked then
      thread(Refresh)
      Exec("CPP/Eudora 11")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
     else
      thread(Refresh)
      Exec("CPP/Eudora 12")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
    end
  end

  function wallhack.OnCheckedChangeListener()
    if wallhack.checked then
      thread(Refresh)
      Exec("CPP/Eudora 7")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
     else
      thread(Refresh)
      Exec("CPP/Eudora 8")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
    end
  end


  function autospawn.OnCheckedChangeListener()
    if autospawn.checked then
      thread(Refresh)
      Exec("CPP/Eudora 9")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
     else
      thread(Refresh)
      Exec("CPP/Eudora 10")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
    end
  end


  function unlockskin.OnCheckedChangeListener()
    if unlockskin.checked then
      thread(Refresh)
      Exec("CPP/Eudora 5")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
     else
      thread(Refresh)
      Exec("CPP/Eudora 6")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
    end
  end


  function emblem.OnCheckedChangeListener()
    if emblem.checked then
      thread(Refresh)
      Exec("CPP/Eudora 3")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
     else
      thread(Refresh)
      Exec("CPP/Eudora 4")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
    end
  end


  function fixgrass.OnCheckedChangeListener()
    if fixgrass.checked then
      thread(Refresh)
      Exec("CPP/Eudora 1")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
     else
      thread(Refresh)
      Exec("CPP/Eudora 2")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Eudora*"))
    end
  end


  function removegrass.OnCheckedChangeListener()
    if removegrass.checked then
      thread(Refresh)
      Exec("CPP/Franco 1")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Franco*"))
     else
      thread(Refresh)
      Exec("CPP/Franco 2")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Franco*"))
    end
  end


  function hidename.OnCheckedChangeListener()
    if hidename.checked then
      thread(Refresh)
      Exec("CPP/Franco 3 ")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Franco*"))
     else
      thread(Refresh)
      Exec("CPP/Franco 4")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Franco*"))
    end
  end


  function radarmap.OnCheckedChangeListener()
    if radarmap.checked then
      thread(Refresh)
      Exec("CPP/Nana 2")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Nana*"))
     else
      thread(Refresh)
      Exec("CPP/Nana 3")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Nana*"))
    end
  end


  function spamchat.OnCheckedChangeListener()
    if spamchat.checked then
      thread(Refresh)
      Exec("CPP/Nana 6")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Nana*"))
     else
      thread(Refresh)
      Exec("CPP/Nana 7")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Nana*"))
    end
  end


  function skillnocd.OnCheckedChangeListener()
    if skillnocd.checked then
      thread(Refresh)
      Exec("CPP/Nana 8")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Nana*"))
     else
      thread(Refresh)
      Exec("CPP/Nana 9")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Nana*"))
    end
  end


  function esplock.OnCheckedChangeListener()
    if esplock.checked then
      thread(Refresh)
      Exec("CPP/Nana 30")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Nana*"))
     else
      thread(Refresh)
      Exec("CPP/Nana 31")
      thread(Refresh)
      os.execute("rmdir "..activity.getLuaDir("CPP/Nana*"))
    end
  end


  droneviewtop.setOnSeekBarChangeListener{
    onProgressChanged=function(view, progress)
      if progress==0 then
        text.setText("• VERTICAL 0X")
        thread(Refresh)
        Exec("CPP/PNJ 22")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
      if progress==1 then
        text.setText("• VERTICAL 2X")
        thread(Refresh)
        Exec("CPP/PNJ 21")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
      if progress==2 then
        text.setText("• VERTICAL 4X")
        thread(Refresh)
        Exec("CPP/PNJ 20")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
      if progress==3 then
        text.setText("• VERTICAL 6X")
        thread(Refresh)
        Exec("CPP/PNJ 19")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
      if progress==4 then
        text.setText("• VERTICAL 8X")
        thread(Refresh)
        Exec("CPP/PNJ 18")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
      if progress==5 then
        text.setText("• VERTICAL 10X")
        thread(Refresh)
        Exec("CPP/PNJ 17")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
      if progress==6 then
        text.setText("• VERTICAL 12X")
        thread(Refresh)
        Exec("CPP/PNJ 16")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
      if progress==7 then
        text.setText("• VERTICAL 14X")
        thread(Refresh)
        Exec("CPP/PNJ 15")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
      if progress==8 then
        text.setText("• VERTICAL 16X")
        thread(Refresh)
        Exec("CPP/PNJ 14")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
      if progress==9 then
        text.setText("• VERTICAL 18X")
        thread(Refresh)
        Exec("CPP/PNJ 13")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
      if progress==10 then
        text.setText("• VERTICAL 20X")
        thread(Refresh)
        Exec("CPP/PNJ 12")
        thread(Refresh)
        Thread.sleep(4)
        call("droneviewtop")
      end
    end
  }


  droneviewside.setOnSeekBarChangeListener{
    onProgressChanged=function(view, progress)
      if progress==0 then
        text2.setText("• HORIZONTAL 0X")
        thread(Refresh)
        Exec("CPP/PNJ 42")
        thread(Refresh)
      end
      if progress==1 then
        text2.setText("• HORIZONTAL 2X")
        thread(Refresh)
        Exec("CPP/PNJ  41")
        thread(Refresh)
      end
      if progress==2 then
        text2.setText("• HORIZONTAL 4X")
        thread(Refresh)
        Exec("CPP/PNJ 40")
        thread(Refresh)
      end
      if progress==3 then
        text2.setText("• HORIZONTAL 6X")
        thread(Refresh)
        Exec("CPP/PNJ 39")
        thread(Refresh)
      end
      if progress==4 then
        text2.setText("• HORIZONTAL 8X")
        thread(Refresh)
        Exec("CPP/PNJ 38")
        thread(Refresh)
      end
      if progress==5 then
        text2.setText("• HORIZONTAL 10X")
        thread(Refresh)
        Exec("CPP/PNJ 37")
        thread(Refresh)
      end
      if progress==6 then
        text2.setText("• HORIZONTAL 12X")
        thread(Refresh)
        Exec("CPP/PNJ 36")
        thread(Refresh)
      end
      if progress==7 then
        text2.setText("• HORIZONTAL 14X")
        thread(Refresh)
        Exec("CPP/PNJ 35")
        thread(Refresh)
      end
      if progress==8 then
        text2.setText("• HORIZONTAL 16X")
        thread(Refresh)
        Exec("CPP/PNJ 34")
        thread(Refresh)
      end
      if progress==9 then
        text2.setText("• HORIZONTAL 18X")
        thread(Refresh)
        Exec("CPP/PNJ 33")
        thread(Refresh)
      end
      if progress==10 then
        text2.setText("• HORIZONTAL 20X")
        thread(Refresh)
        Exec("CPP/PNJ 32")
        thread(Refresh)
      end
    end
  }


  function antiban.OnCheckedChangeListener()
    if antiban.checked then
      import "java.io.File"--导入File类
      File("storage/emulated/0/Android/data/com.mobile.legends/cache").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/UnityCache").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/BattleRecord").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/X-HANNYA1"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/FightHistory").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/X-HANNYA2"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/comlibs").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/X-HANNYA_COMLIBS"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/version/android/realversion.xml").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/version/android/X-HANNYA.xml"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/android/LiveSawHistory.bin").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/android/X-HANNYA.bin"))

      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ActivityBugReport.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ActivityBugReport.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_BattleExperienceReport.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_BattleExperienceReport.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_CountryBattle_Report.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_CountryBattle_Report.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_HistoryRecordListItemReport.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_HistoryRecordListItemReport.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_LiveReport.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_LiveReport.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_Report.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_Report.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_Report_BattleEnd_MC.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_Report_BattleEnd_MC.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ReportDetails.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ReportDetails.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ReportNew.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ReportNew.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page0.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page0.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page1.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page1.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page2.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page2.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page3.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page3.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_WarReport.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_WarReport.unity3d_X-HANNYA"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_YesterdayWarReport.unity3d").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_YesterdayWarReport.unity3d_X-HANNYA"))
     else
      import "java.io.File"--导入File类
      File("storage/emulated/0/Android/data/com.mobile.legends/X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/cache"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/UnityCache"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/X-HANNYA1").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/BattleRecord"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/X-HANNYA2").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/FightHistory"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/X-HANNYA_COMLIBS").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/comlibs"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/version/android/X-HANNYA.xml").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/version/android/realversion.xml"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/android/X-HANNYA.bin").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/android/LiveSawHistory.bin"))

      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ActivityBugReport.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ActivityBugReport.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_BattleExperienceReport.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_BattleExperienceReport.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_CountryBattle_Report.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_CountryBattle_Report.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_HistoryRecordListItemReport.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_HistoryRecordListItemReport.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_LiveReport.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_LiveReport.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_Report.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_Report.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_Report_BattleEnd_MC.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_Report_BattleEnd_MC.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ReportDetails.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ReportDetails.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ReportNew.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_ReportNew.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page0.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page0.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page1.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page1.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page2.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page2.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page3.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_SeasonReport_page3.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_WarReport.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_WarReport.unity3d"))
      File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_YesterdayWarReport.unity3d_X-HANNYA").renameTo(File("storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/UI/android/UI_YesterdayWarReport.unity3d"))
    end
  end

  function logs.onClick()
    if logs.checked then
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/cache/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/BattleRecord/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/FightHistory/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/android/LiveSawHistory.bin")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/UnityCache/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/code_cache/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/X-HANNYA/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/X-HANNYA/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/X-HANNYA1/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/X-HANNYA2/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/android/X-HANNYA.bin")
      TOASTTXT("CLEAR CACHE & LOGS SUCCESSFUL")
     else
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/cache/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/BattleRecord/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/FightHistory/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/android/LiveSawHistory.bin")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/UnityCache/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/code_cache/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/X-HANNYA/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/X-HANNYA/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/X-HANNYA1/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/X-HANNYA2/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/android/X-HANNYA.bin")
      TOASTTXT("CLEAR CACHE & LOGS SUCCESSFUL")
    end
  end



end