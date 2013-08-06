----------------------------------------------------------
Tue Aug  6 15:45:06 CST 2013 -- dliang
- Add a bigger image view. the data is from 'event'.
    the image view is learned from hk.weibo.com
    If there was any copyright issue, please inform me. 
    I try to eliminate it.

-  Also, I add two parameters to getEventList to get a larger image.
    The relevant file is EventModel.class.php
    public function getEventList($map='',$order='id DESC',$mid,$width=100,$height=100){
    }

- To make things clear, I add 'screenshot' dir. 
  keep track of every progress.
  Now, I add big-image.png

----------------------------------------------------------
Wed Jul 31 19:47:04 CST 2013 -- dliang

- Try to learn and hack thinksns
- Hot app is coming from 'people' and 'event'.
  Currently, I list the 'recommand person' and 
    'hotest event' in the mainview of 'hot' app.
