<?php
	/* �ļ���ΪFileDir_class.php                                              */ 
	/* ���ļ���Ŀ¼��ĸ��࣬�������ļ���Ŀ¼���õ����Ժͷ�������һ�������� */
	abstract class FileDir {
		protected $name;                             //�ļ���ƣ���·��
		protected $basename;                         //�ļ���֣�����·��
		protected $type;                             //�ļ�����
		protected $size;                             //�ļ�ռ�ô��̴�С
		protected $ctime;                            //�ļ�����ʱ��
		protected $mtime;                           //�ļ��޸�ʱ��
		protected $atime;                            //�ļ�������ʱ��
		protected $able;                             //�ļ�Ȩ��

      	   	/* ���췽�����ڴ����������ʱ��������Ĺ��췽���е��ø÷���ʹ����Ա���� */
        	 /* ����filename���ṩһ���ļ���Ŀ¼���                                 */
		function __construct($filename) {		
			$this->basename=basename($filename);           //Ϊ��Ա����basename����ֵ
			$this->ctime=$this->getDateTime($filename,'c');    //Ϊ��Ա����ctime����ֵ
			$this->mtime=$this->getDateTime($filename,'m');   //Ϊ��Ա����mtime����ֵ
			$this->atime=$this->getDateTime($filename,'a');    //Ϊ��Ա����atime����ֵ
			$this->able=$this->fileAble($filename);           //Ϊ��Ա����able����ֵ
		}	
         
        	 /* ����ʱ���ض����еĳ�Ա����name��ֵ��������ȡ�ļ����*/
		public function getName() {
			return $this->name;            //���ر����ļ���Ƶĳ�Ա����name��ֵ
		}

         	/* ����ʱ���ض����еĳ�Ա����basename��ֵ��������ȡ�ļ��Ļ����*/
		public function getBaseName() {
			return $this->basename;        //���ر����ļ�����Ƶĳ�Ա����basename��ֵ
		}

         	/* ����ʱ���ض����еĳ�Ա����size��ֵ��������ȡ�ļ���ռ�õĴ��̿ռ��С */
		public function getSize() {
			return $this->size;             //���ر����ļ���С�ĳ�Ա����size��ֵ
		}

         	/* ����ʱ���ض����еĳ�Ա����type��ֵ��������ȡ�ļ������� */
		public function getType() {
			return $this->type;            //���ر����ļ����͵ĳ�Ա����type��ֵ
		}

         	/* ����ʱ���ض����еĳ�Ա����able��ֵ��������ȡ�ļ��ķ���Ȩ�� */
		public function getAble(){
			return $this->able;            //���ر����ļ�����Ȩ�޵ĳ�Ա����able��ֵ
		}

         	/* ����ʱ���ض����еĳ�Ա����ctime��ֵ��������ȡ�ļ��Ĵ���ʱ�� */
		public function getCtime(){
			return $this->ctime;	        //���ر����ļ�����ʱ��ĳ�Ա����ctime��ֵ
		}

         	/* ����ʱ���ض����еĳ�Ա����mtime��ֵ��������ȡ�ļ����޸�ʱ��*/
		public function getMtime(){
			return $this->mtime;	       //���ر����ļ��޸�ʱ��ĳ�Ա����mtime��ֵ
		}

         	/* ����ʱ���ض����еĳ�Ա����atime��ֵ��������ȡ�ļ���������ʱ�� */
		public function getAtime(){
			return $this->atime;	       //���ر����ļ�������ʱ��ĳ�Ա����atime��ֵ
		}

		abstract protected function delFile();        //����һ��ɾ���ļ��ĳ��󷽷�����������ʵ��
		
		abstract protected function copyFile($dFile);  //����һ�������ļ��ĳ��󷽷�����������ʵ��

         	/* �����ƶ��ļ���Ϊ�ļ���������ķ���            */
         	/* ����newName���ṩһ���ļ���Ŀ¼�����       */
         	/* ����ֵ�����ɹ�����True��ʧ���򷵻�false     */
		public function moveFile($newName) {
			if(rename($this->name, $newName))  {   //ʹ��rename�������ļ������ж��Ƿ�ɹ�
				$this->name=$newName;           //Ϊ��Ա����name�����¸���ֵ
				return true;                       //������
			}else {                               //����ƶ����ɹ�
              return false;                      //���ؼ�
			}
		}

         	/* ����ȡ���ļ��ֽ���ת��Ϊ���ʵĵ�λ��TB��GB��MB��KB��    */
         	/* ����bytes���ṩһ���ļ�ռ�ô��̵��ֽ����С                  */
         	/* ����ֵ�����ʵĵ�λ                                           */
		protected function toSize($bytes) {        
			if ($bytes >= pow(2,40)) {                    //����ֽ����С����2��40�η�
				$return = round($bytes / pow(1024,4), 2);   //���ֽ����С����1024��4�η�
				$suffix = "TB";                        //��λΪTB
			} elseif ($bytes >= pow(2,30)) {               //����ֽ����С����2��30�η�
				$return = round($bytes / pow(1024,3), 2);   //���ֽ����С����1024��3�η�
				$suffix = "GB";                        //��λΪGB
			} elseif ($bytes >= pow(2,20)) {               //����ֽ����С����2��20�η�
				$return = round($bytes / pow(1024,2), 2);   //���ֽ����С����1024��2�η�
				$suffix = "MB";                        //��λΪMB
			} elseif ($bytes >= pow(2,10)) {               //����ֽ����С����2��10�η�
				$return = round($bytes / pow(1024,1), 2);   //���ֽ����С����1024��1�η�
				$suffix = "KB";                        //��λΪKB
			} else {                                   //����ֽ����СС��2��10�η�
				$return = $bytes;                       //���ֽ����С����
				$suffix = "Byte";                       //��λΪByte
			}
			return $return ." " . $suffix;                   //��ת�������ֵ�뵥λ���Ӳ�����
		}

         	/* ��ȡ�ļ���ʱ�����ԣ�Ϊ����洢ʱ��ĳ�Ա���Ը���ֵ       */
         	/* ����filename���ṩһ���ļ���ƣ��Ӹ��ļ��л�ȡʱ������    */
		/* ����cate���ṩһ������ѡ��ͬ����ʱ��ķ�ţ�m��c��a��   */
         	/* ����ֵ���ļ����������ת����ʽ���ʱ���ַ�              */
		protected function getDateTime($filename,$cate='m'){
			date_default_timezone_set("Etc/GMT-8");                //����ʱ��Ϊ��8ʱ��
			switch($cate){                                      //���������ز�ͬ��ʱ��
				case 'm':                                       //���$cate��ֵΪm
					return date("Y-m-j H:i:s", filemtime($filename));  //�����ļ����޸�ʱ��
					break;
				case 'c':                                        //���$cate��ֵΪm
					return date("Y-m-j H:i:s", filectime($filename));   //�����ļ��Ĵ���ʱ��
					break;
				case 'a':                                        //���$cate��ֵΪm
					return date("Y-m-j H:i:s", fileatime($filename));   //�����ļ���������ʱ��
					break;
				default:                                        //�������������
					return "0000-00-00 00:00:00";                 //������Ч��ʱ��
			}
		}

         	/* ��ȡ�ļ��ķ���Ȩ�ޣ�Ϊ��Ա����able����ֵ��ʹ��8���Ƶ������ʽ���        */
         	/* ����ֵ��Ȩ��ֵ4�ɶ�\2��д\1��ִ�У�7Ϊ4+2+1��ʾ�ɶ���д��ִ�У�0ûȨ�� */
		protected function fileAble(){
			$read=0;                      //��ʹ�û��ɶ��ı���Ϊ0����ʾ���ɶ�
			$write=0;                     //��ʹ�û���д�ı���Ϊ0����ʾ��д
			$exe=0;                      //��ʹ�û�ִ�еı���Ϊ0����ʾִ��
			if(is_readable($this->name))      //����ļ��ɶ�����������
				$read=4;                 //���ɶ��ı�������Ϊ4
	  		if(is_writable($this->name))      //����ļ���д����������
				$write=2;                //����д�ı�������Ϊ2
			if(is_executable($this->name))    //����啛绂ļ���ִ������������
				$exe=1;                  //����ִ�еı�������Ϊ1
			return $read+$write+$exe;       //�����ļ��ķ���Ȩ��ֵ
		}

         	/* ����һ��ħ����������ֱ���������ʱ�������������������γ��ַ��� */
		function __toString() {
			$fileContent="";
			$fileContent.="�ļ���ƣ�".$this->getName()."<br>";      
			$fileContent.="�ļ����ͣ�".$this->getType()."<br>";
			$fileContent.="�ļ���С��".$this->getSize()."<br>";
			$fileContent.="�ļ�����Ȩ�ޣ�".$this->fileAble()."<br>";
			$fileContent.="�ļ�����ʱ�䣺".$this->getCtime()."<br>";
			$fileContent.="�ļ��޸�ʱ�䣺".$this->getMtime()."<br>";
			$fileContent.="�ļ�����ʱ�䣺".$this->getAtime()."<br>";
			return $fileContent;	
		}
	}
?>
