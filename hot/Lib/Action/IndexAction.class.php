<?php
/**
 * 找人首页控制器
 * @author Liang Chenye <liangchenye@gmail.com>
 * @version TS3.0
 */
class IndexAction extends Action
{
        private $event;

	public function _initialize()
	{
		$this->appCssList[] = 'hot.css';


        	//读取'活动'推荐列表
 	        $this->event = D( 'Event','event' );
	        $is_hot_list = $this->event->getHotList();
	        $this->assign('is_hot_list',$is_hot_list);
	}

	public function index()
	{
		//设置‘活动’列表
                $order = 'joinCount DESC,attentionCount DESC,cTime DESC';

		//设置 ‘认证人员’列表
                $type = 'official'; 
                $this->assign('type', $type);
		$conf = model('Xdata')->get('admin_User:official');
		$this->assign('topUser', $conf['top_user']);
		$cate = model('CategoryTree')->setTable('user_official_category')->getNetworkList();

		$cate = getSubByKey($cate,'title');
		$this->setTitle( $title );
		$this->setKeywords( $title );
		$this->setDescription( implode(',', $cate) );

	        $result  = $this->event->getEventList($map,$order,$this->mid,$_GET['order']);
                $this->assign($result);

		$this->display();
	}

	/**
	 * 获取指定父分类的树形结构
	 * @return integer $pid 父分类ID
	 * @return array 指定父分类的树形结构
	 */
	public function getNetworkList()
	{
		$pid = intval($_REQUEST['pid']);
		$list = model('CategoryTree')->setTable('area')->getNetworkList($pid);
		$id = $pid + 100;
		// exit($list[$id]['child']);
		//dump($list[$id]['child']);
		exit(json_encode($list[$id]['child']));
	}
}
