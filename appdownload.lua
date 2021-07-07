appdownload={}
import "android.graphics.Typeface"
function xdc(url,path)
  require "import"
  import "java.net.URL"
  local ur =URL(url)
  import "java.io.File"
  file =File(path);
  local con = ur.openConnection();
  local co = con.getContentLength();
  local is = con.getInputStream();
  local bs = byte[1024]
  local len,read=0,0
  import "java.io.FileOutputStream"
  local wj= FileOutputStream(path);
  len = is.read(bs)
  while len~=-1 do
    wj.write(bs, 0, len);
    read=read+len
    pcall(call,"ding",read,co)
    len = is.read(bs)
  end
  wj.close();
  is.close();
  pcall(call,"dstop",co)
end
function appDownload(url,path)
  thread(xdc,url,path)
end

function toolsdownload(title,url,path,colour)
  local ts=true
  appDownload(url,path)
  local layoutdownload={
    LinearLayout,
    id="appdownbg",
    layout_width="fill",
    layout_height="fill",
    orientation="vertical",
    {
      TextView,
      id="appdownsong",
      text=title,
      layout_margin="15dp",
      textColor="#ff000000",
      textSize="20sp",
      typeface=Typeface.DEFAULT_BOLD,
    },
    {
      TextView,
      id="appdowninfo",
      text="",
      --id="显示信息",
      typeface=Typeface.MONOSPACE,
      layout_marginRight="15dp",
      layout_marginLeft="15dp",
      layout_marginBottom="5dp",
      textSize="15sp",
    },
    {
      ProgressBar,
      id="pgbar",
      style="?android:attr/progressBarStyleHorizontal",
      layout_width="fill",
      progress=0,
      layout_marginRight="15dp",
      layout_marginLeft="15dp",
      layout_marginBottom="15dp",
    },
    {
      LinearLayout,
      layout_marginRight="15dp",
      layout_marginLeft="15dp",
      layout_marginBottom="15dp",
      --  orientation="horizontal",
      layout_width="fill",
      gravity="right",
      {
        TextView,
        textSize="15sp",
        --    layout_gravity="right",
        textColor="#090707",
        text="ClOSE",
        typeface=Typeface.MONOSPACE,
        id="cancel"
      },
    }
  }
  local dldown=AlertDialog.Builder(activity)
  .setView(loadlayout(layoutdownload))
  .show()
  .setCancelable(false)

  function ding(a,b)
    appdowninfo.Text=string.format("%0.2f",a/1024/1024).."/"..string.format("%0.2f",b/1024/1024).." "..""
    pgbar.progress=(a/b*100)
  end

  function dstop(c)
    if ts then
      appdowninfo.Text="Finished "..string.format("%0.2f",c/1024/1024).." "
      luajava.clear(ts)

      ---RESTORE---
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/NightMode.zip" , "/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/NightMode.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/balmondbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/balmondbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/saberbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/saberbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alicebackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alicebackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/nanabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/nanabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/tigrealbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/tigrealbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alubackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alubackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/karinabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/karinabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/akaibackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/akaibackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/francobackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/francobackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/brunobackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/brunobackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/clintbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/clintbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/rafaelabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/rafaelabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/eudorabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/eudorabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/zilongbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/zilongbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannybackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannybackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/laylabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/laylabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/minobackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/minobackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/lolibackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/lolibackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hayabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hayabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/freyabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/freyabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/gordbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/gordbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/natabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/natabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/kagurabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/kagurabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/choubackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/choubackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/sunbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/sunbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alphabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alphabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/rubybackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/rubybackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/yssbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/yssbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/moskovbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/moskovbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/jhonbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/jhonbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/cycbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/cycbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/estesbackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/estesbackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hildabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hildabackup.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aurorabackup.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aurorabackup.zip")











      ---PATCHER---
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/RankBooster.zip" , "/storage/emulated/0/Android/data/com.mobile.legends/files/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/RankBooster.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/ConfigAntiLag.zip" , "/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/ConfigAntiLag.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/NightModeBU.zip" , "/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/NightModeBU.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/NextProjectUI.zip" , "/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/NextProjectUI.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/RecallEpic.zip" , "/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/RecallEpic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyalegends.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyalegends.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyaepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyaepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyalimited.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyalimited.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyastarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyastarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyasuzuhime.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyasuzuhime.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyavalentine.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/miyavalentine.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/balmondelite.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/balmondeite.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/balmondspecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/balmondspecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/saberstarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/saberstarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/saberonimaru.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/saberonimaru.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/sabersquad.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/sabersquad.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/saberlegend.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/saberlegend.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alicestarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alicestarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alicespecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alicespecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aliceepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aliceepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/nanaelite.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/nanaelite.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/tigrealelite.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/tigrealelite.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/tigreallightborn.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/tigreallightborn.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alustarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alustarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aluspecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aluspecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aluepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aluepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alulightborn.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alulightborn.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alulegend.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alulegend.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/karinaepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/karinaepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/karinakof.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/karinakof.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/karinazodiak.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/karinazodiak.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/francostarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/francostarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/francomasterchef.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/francomasterchef.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/franconightmare.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/franconightmare.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/francovalhallaruler.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/francovalhallaruler.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/brunospecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/brunospecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/brunohero.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/brunohero.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/clintbadminton.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/clintbadminton.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/clintgunsandroses.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/clintgunsandroses.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/clintm2.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/clintm2.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/rafaelaelite.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/rafaelaelite.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/rafaelaepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/rafaelaepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/eudoralimited.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/eudoralimited.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/eudoraepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/eudoraepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/zilongepic1.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/zilongepic1.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/zilongepic2.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/zilongepic2.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannystarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannystarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannychristmas.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannychristmas.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannybladedancer.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannybladedancer.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannyskylark.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannyskylark.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannylightborn.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/fannylightborn.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/laylastarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/laylastarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/laylaepic1.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/laylaepic1.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/laylaepic2.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/laylaepic2.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/minozodiak.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/minozodiak.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/lolispecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/lolispecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hayaspecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hayaspecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hayastarlight1.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hayastarlight1.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hayastarlight2.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hayastarlight2.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hayaepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hayaepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/freyaspecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/freyaspecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/freyaepic1.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/freyaepic1.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/freyaepic2.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/freyaepic2.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/gordstarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/gordstarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/gordlegend.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/gordlegend.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/natastarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/natastarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/natastarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/natastarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/kaguraspecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/kaguraspecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/kaguraepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/kaguraepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/kagurastarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/kagurastarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/chouspecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/chouspecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/choustarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/choustarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/chouepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/chouepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/choukof.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/choukof.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/chouhero.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/chouhero.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/choustun.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/choustun.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/sunspecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/sunspecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/sunstarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/sunstarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alphaepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/alphaepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/rubyepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/rubyepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/ysselite.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/ysselite.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/yssstarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/yssstarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/ysscollector.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/ysscollector.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/moskovspecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/moskovspecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/moskovstarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/moskovstarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/jhonspecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/jhonspecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/jhonepic1.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/jhonepic1.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/jhonepic2.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/jhonepic2.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/moskovepic1.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/moskovepic1.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/moskovepic2.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/moskovepic2.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/cycstarlight.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/cycstarlight.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/cycepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/cycepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/cycstarwars.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/cycstarwars.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/estesspecial.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/estesspecial.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/estesepic.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/estesepic.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hildazodiak.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/hildazodiak.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aurorazodiak.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aurorazodiak.zip")
      zip4j.unZipDir("/storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aurorakof.zip" , "/storage/emulated/0/Android/data/" , "zzz55657983")
      os.execute("rm -rf /storage/emulated/0/Android/data/com.mobile.legends/files/dragon2017/assets/android/lua/aurorakof.zip")












      TOASTTXT("DONE ✔")
     else
      luajava.clear(ts)
    end
  end

  cancel.onClick=function(v)
    dldown.dismiss()
    luajava.clear(dldown,layoutdownload)
    ts=nil
  end
end