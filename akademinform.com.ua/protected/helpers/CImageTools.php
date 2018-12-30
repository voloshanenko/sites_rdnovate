<?php
class CImageTools
{
	/**
	 * Upload one image accroding to one file select field on form
	 *
	 * @author Demchenko Ivan
	 */
	public static function attachToRecord(CActiveRecord $model, $removeOld, $fieldName, array $actions, $fileNamePrefix = NULL)
	{
		$table = ucfirst($model->getTableSchema()->name);

		if( $removeOld && $model->{$fieldName} && file_exists($_SERVER['DOCUMENT_ROOT'] . $model->{$fieldName}) )
				unlink($_SERVER['DOCUMENT_ROOT'] . $model->{$fieldName});

		$tempFile = $_FILES[$table]['tmp_name'][$fieldName];
		$tempFileName = $_FILES[$table]['name'][$fieldName];

		$webPath = '/images/' . $table . '/' . $model->getPrimaryKey() . '/';
		$serverPath = $_SERVER['DOCUMENT_ROOT'] . $webPath;

		if( ! file_exists($serverPath) )
			mkdir($serverPath, 0777, TRUE);
		
		Yii::import('application.helpers.CString');
		$newFileName = '';
		if($fileNamePrefix)
			$newFileName = $fileNamePrefix . $model->getPrimaryKey() . '.' . CString::getFileExtension($tempFileName);
		else
			$newFileName = CString::randomString(15) . '.' . CString::getFileExtension($tempFileName);

		$imageName = $webPath . $newFileName;

		$image = Yii::app()->ih->load($tempFile);

		foreach($actions as $method=>$params)
			call_user_func_array(array($image, $method), $params);

		$image->save($_SERVER['DOCUMENT_ROOT'] . $imageName, false, 91);

		return ($fileNamePrefix) ? substr($newFileName, strlen($fileNamePrefix)) : $imageName;
	}
}