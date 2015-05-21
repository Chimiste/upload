	    /**
	 * @package:SMS
	 * @MathsClub::uploadUserPhoto().
	 * @Author:Techno Services
	 */
	public function uploadUserPhoto()
	{

		$dir = $this->config->item('abs_upload_paths');
		$rel_dir = $this->config->item('user_pic_dir');
		$dir = $dir['user_pic_dir'];
	  $config['upload_path'] = $dir;
		$config['allowed_types'] = 'gif|jpg|png';
		//$config['max_size']	= '100';
		//$config['max_width']  = '1051';
		//$config['max_height']  = '351';

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
        $this->status = array();

		if ( ! $this->upload->do_upload("user_photo"))
		{
		    $error = array('error' => $this->upload->display_errors());  
			
			//print_r($error); 
			$this->status['status'] = 0;
			$this->status['msg'] = $this->upload->display_errors();
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			//print_r($data);
		    $rel_dir.$data['upload_data']['file_name'];
			$this->status['status'] = 1;
			$this->status['msg'] = $data['upload_data']['file_name'];
			$this->status['ref'] = 'user_photo';

		}
		
		 echo jsonEncode($this->status); 

	}
