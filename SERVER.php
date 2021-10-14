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
import "android.graphics.drawable.BitmapDrawable"
import "android.graphics.PorterDuff"
import "android.graphics.PorterDuffColorFilter"
import "android.graphics.Typeface"
import "com.androlua.util.RootUtil"
local root=RootUtil()
  if root.haveRoot()==true then
  os.execute("su")
end


  if Settings.canDrawOverlays(activity) then else intent = Intent(Settings.ACTION_APPLICATION_DETAILS_SETTINGS,Uri.parse("package:".. activity.getPackageName()))
    intent.setData(Uri.parse("package:" .. this.getPackageName())); this.startActivity(intent);
    TOASTTXT("Application Require Permission")
  end



LAYOUTVIP={
  LinearLayout;
  backgroundColor="0xFF202428";
  layout_width="fill";
  orientation="CAMERA VIEW";
  layout_height="fill";

  {
    LinearLayout;
    layout_height="50dp";
    gravity="center";
    layout_width="wrap";
  };

  {
    TextView;
    typeface=Typeface.DEFAULT_BOLD,
    id="titlelogin";
    text="ＷＥＬＣＯＭＥ";
    padding="8dp";
    textSize="35sp";
    layout_gravity="center";
    textColor="0xFF008EFF";
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
        hint="INPUT YOUR KEY";
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
    layout_marginLeft="35dp";
    id="rememberme";
    text="Remember Me";
    gravity="center";
    textSize="13";
    textColor="0xFFFFFFFF";
  };

  {
    LinearLayout;
    layout_height="10dp";
    gravity="center";
    layout_width="wrap";
    layout_gravity="center";
  };

  {
    LinearLayout;
    orientation="horizontal";
    layout_width="match_parent";
    layout_height="50dp";
    layout_marginLeft="110dp";
    layout_marginRight="110dp";
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
          id="login";
          textSize="20sp";
          textColor="0xFFFFFFFF";
          layout_gravity="center";
        };
      };
    };
  };
};




activity.setTheme(R.AndLua1)
activity.overridePendingTransition(android.R.anim.fade_in,android.R.anim.fade_out)
--activity.getWindow().addFlags(WindowManager.LayoutParams.FLAG_DRAWS_SYSTEM_BAR_BACKGROUNDS).setStatusBarColor(0xFF000000);
activity.getWindow().addFlags(WindowManager.LayoutParams.FLAG_TRANSLUCENT_STATUS);
activity.setContentView(loadlayout(LAYOUTVIP))
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
  drawable.setStroke(2, InsideColor1)
  view.setBackgroundDrawable(drawable)
end




import "android.view.animation.AlphaAnimation"
Alpha=AlphaAnimation(0,1)
Alpha.setDuration(800)







--CircleButton(us,0x20000000,10,0x00000000)
--CircleButton(pw,0x20000000,10,0x00000000)
--CircleButton(uidX,0x20000000,10,0x00000000)






function proggresmod()
  P_layout={
    LinearLayout;
    layout_height="fill";
    layout_width="fill";
    orientation="horizontal";
    gravity="center";
    {
      LinearLayout;
      orientation="CAMERA VIEW";
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
    D1.setTitle("APPLICATION EXPIRED")
    D1.setMessage("PLEASE CONTACT DEVELOPER TO GET UPDATE !!\n\nᴅᴏɴ'ᴛ ᴛʀʏ ᴛᴏ ᴄʜᴀɴɢᴇ ʏᴏᴜʀ ᴛɪᴍᴇ ᴀɴᴅ ᴅᴀᴛᴇ シ︎")
    D1.setCancelable(false)
    D1.setPositiveButton(" EXIT ",{onClick=function(v)
    os.exit()
      end})
    SANKY1=D1.show()
  end


  function Exp2()
    local D2 = AlertDialog.Builder(this)
    D2.setTitle("FAILED TO BYPASS EXPIRED")
    D2.setMessage("ɪ sᴀɪᴅ ᴅᴏɴ'ᴛ ᴛʀʏ ᴛᴏ ᴄʜᴀɴɢᴇ ʏᴏᴜʀ ᴛɪᴍᴇ ᴀɴᴅ ᴅᴀᴛᴇ, ʙᴇᴄᴀᴜsᴇ ᴛʜᴀᴛ ᴅᴏᴇsɴ'ᴛ ᴡᴏʀᴋ ᴀɴʏᴍᴏʀᴇ シ︎\n\n              FUCK YOU BITCH !!!")
    D2.setCancelable(false)
    D2.setPositiveButton(" EXIT ",{onClick=function(v)
    os.exit()
      end})
    SANKY2=D2.show()
  end

  Exp1()
  Exp2()

  function expired()
    Date1 = "20211216"--Expired Date
    Date2 = "%Y%m%d"--Will be show if the date has changed to less than the current date set.
    Date3 = "20211014"--Current Date
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
    TOASTTXT("INPUT KEY")
   else
    local pref = activity.getSharedPreferences("x_hannya", Context.MODE_PRIVATE)
    local save = pref.edit()
    save.putString("username",username)
    save.commit()
    proggresmod()
    urla="https://raw.githubusercontent.com/missfangg/X-HANNYA/main/key.php"
    Http.get(urla,nil,function(code,content)
      X.dismiss()
      AP=content:match("【S】(.-)【S】")
      if AP== txtUsername.text
        LoginExpired()
        main2()
       else
        TOASTTXT("INVALID KEY")
      end
    end)
  end
end


rememberme.ButtonDrawable.setColorFilter(PorterDuffColorFilter(0xFFFFFFFF,PorterDuff.Mode.SRC_ATOP));
login.setTypeface(Typeface.DEFAULT_BOLD)
titlelogin.setTypeface(Typeface.DEFAULT_BOLD)
us.setVisibility(LinearLayout.VISIBLE)
btnLogin.setVisibility(LinearLayout.VISIBLE)
rememberme.setVisibility(LinearLayout.VISIBLE)



function main2()


  os.execute("mkdir /storage/emulated/0/XHP-PROJECT")
  io.open("/storage/emulated/0/XHP-PROJECT/JOIN TELEGRAM @xhp_project", "w+")
  io.open("/storage/emulated/0/.X-HANNYA", "w+")


  layout={
    LinearLayout;
    orientation="CAMERA VIEW";
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
      orientation="CAMERA VIEW";
      layout_width="fill";
      layout_height="10%h";
      gravity="center";

      {
        TextView;
        typeface=Typeface.DEFAULT_BOLD,
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
        orientation="CAMERA VIEW";
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
            typeface=Typeface.DEFAULT_BOLD,
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
            typeface=Typeface.DEFAULT_BOLD,
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
          typeface=Typeface.DEFAULT_BOLD,
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
      Orientation="CAMERA VIEW";
      gravity="center|bottom";
      layout_height="fill";
    };
  };

  floating={
    LinearLayout,
    layout_width="fill",
    layout_height="fill",
    background="transparent",
    orientation="CAMERA VIEW";
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
        orientation="CAMERA VIEW";
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
              orientation="CAMERA VIEW";
              layout_gravity="center";
              {
                LinearLayout;
                layout_height="wrap";
                layout_width="fill";
                orientation="CAMERA VIEW";
                layout_gravity="center";
                {
                  TextView,
                  typeface=Typeface.DEFAULT_BOLD,
                  layout_width="wrap",
                  layout_height="wrap",
                  layout_gravity="center",
                  textColor="0xFFFFFFFF",
                  textSize="18sp",
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
            orientation="CAMERA VIEW";
            layout_width="fill",
            layout_height="fill",
            gravity="center";
            {
              LinearLayout;
              orientation="CAMERA VIEW";
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
                    orientation="CAMERA VIEW";
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
                        orientation="CAMERA VIEW";
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
                          orientation="CAMERA VIEW";
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
                              orientation="CAMERA VIEW";
                              {
                                LinearLayout;
                                orientation="CAMERA VIEW";
                                layout_height="fill";
                                layout_width="fill";
                              };

                              {
                                Switch;
                                text="• MAP HACK";
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
                                TextView;
                                id="text";
                                layout_width="wrap_content";
                                layout_height="wrap_content";
                                text="• CAMERA VIEW 0 X";
                                textColor="0xFFFFFFFF";
                                textSize="12sp";
                              };
 
                 
                                {
                                  SeekBar;
                                  id="droneviewtop";
                                  layout_width="match_parent";
                                  layout_height="wrap_content";
                                  max="10";
                                  progress="0";
                                };
                              




      
                              {
                                ToggleButton,
                                typeface=Typeface.DEFAULT_BOLD,
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
        layout_height="48dp";
        layout_width="48dp";
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
    dd = tonumber("02") - tonumber(os.date("%d"))
    hh=tonumber("9") - tonumber(os.date("%H"))
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


  if root.haveRoot()==true then
    status.Text="ROOTED";
    status.textColor=0xFFFFFFFF
    --root.setChecked(true)
   else
    status.Text="VIRTUAL";
    status.textColor=0xFFFFFFFF
    --noroot.setChecked(true)
  end



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
    if isMax==true && OpenM==true then
      isMax=false OpenM=false
      LayoutVIP.removeView(mainWindow)
    end
  end




  function start.onClick()
    Waterdropanimation(start,20)
    if Settings.canDrawOverlays(activity) then else intent=Intent("android.settings.action.MANAGE_OVERLAY_PERMISSION");
      intent.setData(Uri.parse("package:" .. this.getPackageName())); this.startActivity(intent);
    end
    if isMax==false then
      isMax=true
      LayoutVIP1.addView(minWindow,A3params1)
     else
      TOASTTXT("CHEAT IS RUNNING !!")
    end
  end

  function stop.onClick()
    Waterdropanimation(stop,20)
    if isMax==true && OpenM==true then
      isMax=false OpenM=false
      LayoutVIP.removeView(mainWindow)
     elseif isMax==true && OpenM==false then
      isMax=false
      LayoutVIP1.removeView(minWindow)
     else
      TOASTTXT("CHEAT NOT RUNNING !!")
    end
  end





  function playid.onClick()
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
    url = "http://t.me/xhp_project"
    activity.startActivity(Intent(Intent.ACTION_VIEW, Uri.parse(url)))
  end

  youtube.onClick=function()
    url = "https://youtube.com/channel/UCdLqzSTn88RBFeeCEH8D1RA"
    activity.startActivity(Intent(Intent.ACTION_VIEW, Uri.parse(url)))
  end

  exit.onClick=function()
  os.exit()
  end





  CircleButton(iconf,0xFFFFFFFF,75,0xFFFFFFFF)
  CircleButton(start,0x00000000,20,0xFFFFFFFF)
  CircleButton(stop,0x00000000,20,0xFFFFFFFF)
  CircleButton(play,0x00000000,20,0xFFFFFFFF)
  CircleButton(info,0xFF000000,20,0xFFFFFFFF)
  CircleButton(logs,0xFFFF0000,10,4287187697)
  


  --SeekBar
droneviewtop.ProgressDrawable.setColorFilter(PorterDuffColorFilter(0xFFFF0000,PorterDuff.Mode.SRC_ATOP))
maphack.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFD7FFF1,PorterDuff.Mode.SRC_ATOP));
hidename.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFD7FFF1,PorterDuff.Mode.SRC_ATOP));
spamchat.TrackDrawable.setColorFilter(PorterDuffColorFilter(0xFFD7FFF1,PorterDuff.Mode.SRC_ATOP));


  function Exec(one)
    local two=activity.getApplicationInfo().nativeLibraryDir.."/"..(one)
    if root.haveRoot()==true then
      os.execute("su -c chmod 777 "..two)
      Runtime.getRuntime().exec("su -c "..two)
     else
      os.execute("chmod 777 "..two)
      Runtime.getRuntime().exec(""..two)
    end
  end


  function maphack.OnCheckedChangeListener()
    if maphack.checked then
      Exec("libsocket.so 2")
      Exec("libmime.so 1")
     else
      Exec("libsocket.so 3")
      Exec("libmime.so 2")
    end
  end

  
  function hidename.OnCheckedChangeListener()
    if hidename.checked then
      Exec("libcjson.so 3 ")
     else
      Exec("libcjson.so 4")
    end
  end


  function spamchat.OnCheckedChangeListener()
    if spamchat.checked then
      Exec("libsocket.so 6")
     else
      Exec("libsocket.so 7")
    end
  end


  droneviewtop.setOnSeekBarChangeListener{
    onProgressChanged=function(view, progress)
      if progress==0 then
        text.setText("• CAMERA VIEW 0X")
        Exec("libsocket.so 22")
      end
      if progress==1 then
        text.setText("• CAMERA VIEW 2X")
        Exec("libsocket.so 21")
      end
      if progress==2 then
        text.setText("• CAMERA VIEW 4X")
        Exec("libsocket.so 20")
      end
      if progress==3 then
        text.setText("• CAMERA VIEW 6X")
        Exec("libsocket.so 19")
      end
      if progress==4 then
        text.setText("• CAMERA VIEW 8X")
        Exec("libsocket.so 18")
      end
      if progress==5 then
        text.setText("• CAMERA VIEW 10X")
        Exec("libsocket.so 17")
      end
      if progress==6 then
        text.setText("• CAMERA VIEW 12X")
        Exec("libsocket.so 16")
      end
      if progress==7 then
        text.setText("• CAMERA VIEW 14X")
        Exec("libsocket.so 15")
      end
      if progress==8 then
        text.setText("• CAMERA VIEW 16X")
        Exec("libsocket.so 14")
      end
      if progress==9 then
        text.setText("• CAMERA VIEW 18X")
        Exec("libsocket.so 13")
      end
      if progress==10 then
        text.setText("• CAMERA VIEW 20X")
        Exec("libsocket.so 12")
      end
    end
  }


  function logs.onClick()
    if logs.checked then
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/cache/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/BattleRecord/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/FightHistory/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/UnityCache/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/code_cache/")
      TOASTTXT("CLEAR CACHE & LOGS SUCCESSFUL")
     else
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/cache/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/BattleRecord/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/FightHistory/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/UnityCache/")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/code_cache/")
      TOASTTXT("CLEAR CACHE & LOGS SUCCESSFUL")
    end
  end
end
