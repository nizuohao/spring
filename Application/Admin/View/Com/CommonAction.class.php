<?php

// 本类由系统自动生成，仅供测试用途
class CommonAction extends Action {
	Public function _initialize(){
	   R("Public/issession");
	}
	public function getclass(){
			$c=$_GET['cid'];
			$class=M("class");
			$data=$class->where("c_gid='".$c."'")->select();
			$string = "<option value=''>--请选择--</option>";
			    foreach($data as $value){
			        $string.="<option value=".$value['c_id'].">".$value['c_name']."</option>";
			    }
			echo $string;
		}
	public function getstu(){
			$cid=$_GET['cid'];
			$stu=M("stu");
			$data=$stu->where("c_id='".$cid."'")->select();
			$string = "<option value=''>--请选择--</option>";
			    foreach($data as $value){
			        $string.="<option value=".$value['s_id'].">".$value['s_name']."</option>";
			    }
			echo $string;
		}
		
 public  function getExcel($headArr,$data,$fileName){
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("ORG.Util.PHPExcel");
        import("ORG.Util.PHPExcel.Writer.Excel5");
        import("ORG.Util.PHPExcel.IOFactory.php");
        $date = date("Y_m_d_H_i",time());
        $fileName .= "_{$date}.xls";
        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();
        //设置表头
        $key = ord("A");
        //print_r($headArr);exit;
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }
        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
        //print_r($data);exit;
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }
        $fileName = iconv("utf-8", "gb2312", $fileName);
        //重命名表
        //$objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }
	public function send($email,$time,$type) {
          import("ORG.Util.Smtp");
            $smtpserver = "smtp.163.com"; //SMTP服务器
            $smtpserverport = 25; //SMTP服务器端口
            $smtpusermail = "liu33443344@163.com"; //SMTP服务器的用户邮箱
            $smtpuser = "liu33443344@163.com"; //SMTP服务器的用户帐号
            $smtppass = "1499204112"; //SMTP服务器的用户密码
            $smtp = new Smtp($smtpserver, $smtpserverport, true, $smtpuser, $smtppass); //这里面的一个true是表示使用身份验证,否则不使用身份验证.
            $emailtype = "HTML"; //信件类型，文本:text；网页：HTML
            $smtpemailto = $email;
            $smtpemailfrom = $smtpusermail;
            $emailsubject = "就业信息服务网 - 审核";
            if($type==1){
                 $emailbody = "亲爱的" . $email . "：<br/>您在" . $time . "注册了就业信息网。<br/>恭喜您通过本站的审核。<br/>如果您没有注册过本站，请忽略此邮件。";
            }else{
                $emailbody = "亲爱的" . $email . "：<br/>您在" . $time . "注册了就业信息网。但是您没有通过本站的审核，请您仔细修改一下您的信息。<br/>如果您没有注册过本站，请忽略此邮件。";
            }
            $rs = $smtp->sendmail($smtpemailto, $smtpemailfrom, $emailsubject, $emailbody, $emailtype);
            return $rs;
}
}