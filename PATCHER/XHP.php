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
import "layout"


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


if Settings.canDrawOverlays(activity) then else intent=Intent("android.settings.action.MANAGE_OVERLAY_PERMISSION");
  intent.setData(Uri.parse("package:" .. this.getPackageName())); this.startActivity(intent);
end

os.execute("mkdir /storage/emulated/0/XHP-PROJECT")
io.open("/storage/emulated/0/XHP-PROJECT/JOIN TELEGRAM @xhp_project", "w+")
io.open("/storage/emulated/0/.X-HANNYA", "w+")



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
  dd = tonumber("27") - tonumber(os.date("%d"))
  hh=tonumber("21") - tonumber(os.date("%H"))
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




import "floating"
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

import "icon"
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
  vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
  vibrator.vibrate( long{20,10} ,-5)
  if isMax==false then
    isMax=true
    LayoutVIP1.addView(minWindow,A3params1)
   else
    TOASTTXT("CHEAT IS RUNNING !!")
  end
end

function stop.onClick()
  Waterdropanimation(stop,20)
  vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
  vibrator.vibrate( long{20,10} ,-5)
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
      vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
      vibrator.vibrate( long{20,10} ,-5)
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
  vibrator.vibrate( long{20,10} ,-5)
  url = "http://t.me/xhp_project"
  activity.startActivity(Intent(Intent.ACTION_VIEW, Uri.parse(url)))
end

youtube.onClick=function()
  vibrator = activity.getSystemService(Context.VIBRATOR_SERVICE)
  vibrator.vibrate( long{20,10} ,-5)
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


function Exec(one)
  local two=activity.getApplicationInfo().nativeLibraryDir.."/"..(one)
  if RootUtil().haveRoot()==true then
    os.execute("su -c chmod 777 "..two)
    Runtime.getRuntime().exec("su -c "..two)
    Thread.sleep("5")
   else
    os.execute("chmod 777 "..two)
    Runtime.getRuntime().exec(""..two)
    Thread.sleep("5")
  end
end


function Exec1(cpp)
  local dir=activity.getLuaDir(cpp)
  if RootUtil().haveRoot()==true then
    os.execute("su -c chmod 777 "..dir)
    Runtime.getRuntime().exec("su -c "..dir)
    Thread.sleep("5")
   else
    os.execute("chmod 777 "..dir)
    Runtime.getRuntime().exec(""..dir)
    Thread.sleep("5")
  end
end


function hero.onClick()
  hero.show()
end
hero = PopupMenu(activity, hero)
menu = hero.Menu

menu.add(" • Aldous                                            ").onMenuItemClick = function()
  Exec1("CPP/Aldous")
end
menu.add(" • Alucard                                   ").onMenuItemClick = function()
  Exec1("CPP/Alucard")
end
menu.add(" • Atlas                                     ").onMenuItemClick = function()
  Exec1("CPP/Atlas")
end
menu.add(" • Barats                                     ").onMenuItemClick = function()
  Exec1("CPP/Barats")
end
menu.add(" • Beatrix                                       ").onMenuItemClick = function()
  Exec1("CPP/Beatrix")
end
menu.add(" • Benedetta                                  ").onMenuItemClick = function()
  Exec1("CPP/Benedetta")
end
menu.add(" • Brody                                       ").onMenuItemClick = function()
  Exec1("CPP/Brody")
end
menu.add(" • Bruno                                      ").onMenuItemClick = function()
  Exec1("CPP/Bruno")
end
menu.add(" • Chou                                        ").onMenuItemClick = function()
  Exec1("CPP/Chou")
end
menu.add(" • Claude                                     ").onMenuItemClick = function()
  Exec1("CPP/Claude")
end
menu.add(" • Clint                                      ").onMenuItemClick = function()
  Exec1("CPP/Clint")
end
menu.add(" • Dyroth                                    ").onMenuItemClick = function()
  Exec1("CPP/Dyroth")
end
menu.add(" • Esmeralda                                   ").onMenuItemClick = function()
  Exec1("CPP/Esmeralda")
end
menu.add(" • Fanny                                   ").onMenuItemClick = function()
  Exec1("CPP/Fanny")
end
menu.add(" • Freya                                   ").onMenuItemClick = function()
  Exec1("CPP/Freya")
end
menu.add(" • Granger                                   ").onMenuItemClick = function()
  Exec1("CPP/Granger")
end
menu.add(" • Guinevere                                   ").onMenuItemClick = function()
  Exec1("CPP/Guinevere")
end
menu.add(" • Gusion                                   ").onMenuItemClick = function()
  Exec1("CPP/Gusion")
end
menu.add(" • Hanabi                                   ").onMenuItemClick = function()
  Exec1("CPP/Hanabi")
end
menu.add(" • Hanzo                                   ").onMenuItemClick = function()
  Exec1("CPP/Hanzo")
end
menu.add(" • Harith                                  ").onMenuItemClick = function()
  Exec1("CPP/Harith")
end
menu.add(" • Harley                                  ").onMenuItemClick = function()
  Exec1("CPP/Harley")
end
menu.add(" • Hayabusa                              ").onMenuItemClick = function()
  Exec1("CPP/Hayabusa")
end
menu.add(" • Helcurt                                 ").onMenuItemClick = function()
  Exec1("CPP/Helcurt")
end
menu.add(" • Jawhead                               ").onMenuItemClick = function()
  Exec1("CPP/Jawhead")
end
menu.add(" • Kadita                              ").onMenuItemClick = function()
  Exec1("CPP/Kadita")
end
menu.add(" • Kagura                             ").onMenuItemClick = function()
  Exec1("CPP/Kagura")
end
menu.add(" • Karina                            ").onMenuItemClick = function()
  Exec1("CPP/Karina")
end
menu.add(" • Karrie                            ").onMenuItemClick = function()
  Exec1("CPP/Karrie")
end
menu.add(" • Khaleed                            ").onMenuItemClick = function()
  Exec1("CPP/Khaleed")
end
menu.add(" • Kimmy                            ").onMenuItemClick = function()
  Exec1("CPP/Kimmy")
end
menu.add(" • Kufra                           ").onMenuItemClick = function()
  Exec1("CPP/Kufra")
end
menu.add(" • Lancelot                      ").onMenuItemClick = function()
  Exec1("CPP/Lancelot")
end
menu.add(" • Lapu Lapu                     ").onMenuItemClick = function()
  Exec1("CPP/Lapu")
end
menu.add(" • Leomord                           ").onMenuItemClick = function()
  Exec1("CPP/Leomord")
end
menu.add(" • Lesley                          ").onMenuItemClick = function()
  Exec1("CPP/Lesley")
end
menu.add(" • Ling                          ").onMenuItemClick = function()
  Exec1("CPP/Ling")
end
menu.add(" • Lunox                          ").onMenuItemClick = function()
  Exec1("CPP/Lunox")
end
menu.add(" • Martis                         ").onMenuItemClick = function()
  Exec1("CPP/Martis")
end
menu.add(" • Mathilda                       ").onMenuItemClick = function()
  Exec1("CPP/Mathilda")
end
menu.add(" • Minsithar                  ").onMenuItemClick = function()
  Exec1("CPP/Minsithar")
end
menu.add(" • Miya                      ").onMenuItemClick = function()
  Exec1("CPP/Miya")
end
menu.add(" • Moskov                      ").onMenuItemClick = function()
  Exec1("CPP/Moskov")
end
menu.add(" • Natalia                     ").onMenuItemClick = function()
  Exec1("CPP/Natalia")
end
menu.add(" • Paquito                     ").onMenuItemClick = function()
  Exec1("CPP/Paquito")
end
menu.add(" • Pharsa                    ").onMenuItemClick = function()
  Exec1("CPP/Pharsa")
end
menu.add(" • Popol & Kupa               ").onMenuItemClick = function()
  Exec1("CPP/Popol")
end
menu.add(" • Roger                    ").onMenuItemClick = function()
  Exec1("CPP/Roger")
end
menu.add(" • Ruby                    ").onMenuItemClick = function()
  Exec1("CPP/Ruby")
end
menu.add(" • Selena                   ").onMenuItemClick = function()
  Exec1("CPP/Selena")
end
menu.add(" • Silvana                ").onMenuItemClick = function()
  Exec1("CPP/Silvana")
end
menu.add(" • Terizla               ").onMenuItemClick = function()
  Exec1("CPP/Terizla")
end
menu.add(" • Thamuz             ").onMenuItemClick = function()
  Exec1("CPP/Thamuz")
end
menu.add(" • Uranus             ").onMenuItemClick = function()
  Exec1("CPP/Uranus")
end
menu.add(" • X-Borg             ").onMenuItemClick = function()
  Exec1("CPP/Xborg")
end
menu.add(" • Yi Sun Shin         ").onMenuItemClick = function()
  Exec1("CPP/Yss")
end
menu.add(" • Yu Zhong          ").onMenuItemClick = function()
  Exec1("CPP/Yuzhong")
end
menu.add(" • Yve             ").onMenuItemClick = function()
  Exec1("CPP/Yve")
end


function wallhack.OnCheckedChangeListener()
  if wallhack.checked then
    Exec("libmime.so 7")
   else
    Exec("libmime.so 8")
  end
end


function autospawn.OnCheckedChangeListener()
  if autospawn.checked then
    Exec("libmime.so 9")
   else
    Exec("libmime.so 10")
  end
end


function unlockskin.OnCheckedChangeListener()
  if unlockskin.checked then
    Exec("libmime.so 5")
   else
    Exec("libmime.so 6")
  end
end


function emblem.OnCheckedChangeListener()
  if emblem.checked then
    Exec("libmime.so 3")
   else
    Exec("libmime.so 4")
  end
end


function fixgrass.OnCheckedChangeListener()
  if fixgrass.checked then
    Exec("libmime.so 1")
   else
    Exec("libmime.so 2")
  end
end


function removegrass.OnCheckedChangeListener()
  if removegrass.checked then
    Exec("libcjson.so 1")
   else
    Exec("libcjson.so 2")
  end
end


function hidename.OnCheckedChangeListener()
  if hidename.checked then
    Exec("libcjson.so 3 ")
   else
    Exec("libcjson.so 4")
  end
end


function radarmap.OnCheckedChangeListener()
  if radarmap.checked then
    Exec("libsocket.so 2")
   else
    Exec("libsocket.so 3")
  end
end


function spamchat.OnCheckedChangeListener()
  if spamchat.checked then
    Exec("libsocket.so 6")
   else
    Exec("libsocket.so 7")
  end
end


function skillnocd.OnCheckedChangeListener()
  if skillnocd.checked then
    Exec("libsocket.so 8")
   else
    Exec("libsocket.so 9")
  end
end


function esplock.OnCheckedChangeListener()
  if esplock.checked then
    Exec("libsocket.so 30")
   else
    Exec("libsocket.so 31")
  end
end


droneviewtop.setOnSeekBarChangeListener{
  onProgressChanged=function(view, progress)
    if progress==0 then
      text.setText("• VERTICAL 0X")
      Exec("libsocket.so 22")
    end
    if progress==1 then
      text.setText("• VERTICAL 2X")
      Exec("libsocket.so 21")
    end
    if progress==2 then
      text.setText("• VERTICAL 4X")
      Exec("libsocket.so 20")
    end
    if progress==3 then
      text.setText("• VERTICAL 6X")
      Exec("libsocket.so 19")
    end
    if progress==4 then
      text.setText("• VERTICAL 8X")
      Exec("libsocket.so 18")
    end
    if progress==5 then
      text.setText("• VERTICAL 10X")
      Exec("libsocket.so 17")
    end
    if progress==6 then
      text.setText("• VERTICAL 12X")
      Exec("libsocket.so 16")
    end
    if progress==7 then
      text.setText("• VERTICAL 14X")
      Exec("libsocket.so 15")
    end
    if progress==8 then
      text.setText("• VERTICAL 16X")
      Exec("libsocket.so 14")
    end
    if progress==9 then
      text.setText("• VERTICAL 18X")
      Exec("libsocket.so 13")
    end
    if progress==10 then
      text.setText("• VERTICAL 20X")
      Exec("libsocket.so 12")
    end
  end
}


droneviewside.setOnSeekBarChangeListener{
  onProgressChanged=function(view, progress)
    if progress==0 then
      text2.setText("• HORIZONTAL 0X")
      Exec("libsocket.so 42")
    end
    if progress==1 then
      text2.setText("• HORIZONTAL 2X")
      Exec("libsocket.so  41")
    end
    if progress==2 then
      text2.setText("• HORIZONTAL 4X")
      Exec("libsocket.so 40")
    end
    if progress==3 then
      text2.setText("• HORIZONTAL 6X")
      Exec("libsocket.so 39")
    end
    if progress==4 then
      text2.setText("• HORIZONTAL 8X")
      Exec("libsocket.so 38")
    end
    if progress==5 then
      text2.setText("• HORIZONTAL 10X")
      Exec("libsocket.so 37")
    end
    if progress==6 then
      text2.setText("• HORIZONTAL 12X")
      Exec("libsocket.so 36")
    end
    if progress==7 then
      text2.setText("• HORIZONTAL 14X")
      Exec("libsocket.so 35")
    end
    if progress==8 then
      text2.setText("• HORIZONTAL 16X")
      Exec("libsocket.so 34")
    end
    if progress==9 then
      text2.setText("• HORIZONTAL 18X")
      Exec("libsocket.so 33")
    end
    if progress==10 then
      text2.setText("• HORIZONTAL 20X")
      Exec("libsocket.so 32")
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
    Date1 = "20210729"--Expired Date
    Date2 = "%Y%m%d"--Will be show if the date has changed to less than the current date set.
    Date3 = "20210727"--Current Date
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

LoginExpired()

