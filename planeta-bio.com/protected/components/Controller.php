<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	public $metaKeywords = 'Планета био, мир животных, статьи о животных, разведение собак, кошек, уход за животными';
	public $metaDescription = 'Портал о животных и всем, что с ними связанно.';
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	
	public $adminMenu=array();
	
	/**
	 * Information pages
	 */
	public $infoPages=array();
	
	protected function beforeAction()
	{
		if($this->getUniqueId()=='site' || $this->getUniqueId()=='ads/default') {
			return true;
		} else {
			if(!Yii::app()->user->isGuest) {
				$admnActions = array('admin','create','update','delete');
				$this->generateMenu();
				$action = $this->getAction()->getId();
				$groupsModel = UserGroup::model();
				if( Yii::app()->user->role=='admin' ) {
					return true;
				}
				if( Yii::app()->user->role=='manager' ) {
					$uModel = Users::model()->findByPK(Yii::app()->user->id);
					if((bool)$uModel->group_id) {
						$group = $groupsModel->findByPk($uModel->group_id);
						$allowedSections = unserialize($group->params);
						if (!in_array($this->getUniqueId(), $allowedSections)) {
							if( in_array($action, $admnActions) ) {
								throw new CHttpException('403', 'Извините, у вас не хватает прав для доступа.');
							}
						}
					}
				}
			}	
			return true;
		}
	}

	private function generateMenu()
	{
		if(!Yii::app()->user->isGuest) {
			$groupsModel = UserGroup::model();
			if( Yii::app()->user->role=='admin' ) {
				$this->adminMenu = $groupsModel->sectionsList;
			}
			if( Yii::app()->user->role=='manager' ) {
				$uModel = Users::model()->findByPK(Yii::app()->user->id);
				$group = $groupsModel->findByPk($uModel->group_id);
				$allowedSections = unserialize($group->params);
				foreach($allowedSections as $itm) {
					$this->adminMenu[$itm]=$groupsModel->sectionsList[$itm];
				}
			}
		}
	}
	
	public function getInfoPages()
	{
		$sections = PagesSections::model()->with(array(
			'pages'=>array(
				'order'=>'t.ordering asc, pages.ordering asc'
			)
		))->findAll();
		$this->infoPages = $sections;
	}
	
	protected function canAdminAction()
	{
		$user = Yii::app()->user;
		return !$user->isGuest && ($user->role=='admin' || ($user->role=='manager' && in_array($this->uniqueId, unserialize($user->group))));
	}
}