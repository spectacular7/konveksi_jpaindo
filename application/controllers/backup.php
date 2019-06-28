public function editdata()
	{

		$data['design'] = $this->Design_model->get_by_id($this->input->post('KdDesain'));
		$upload_image = $_FILES['GbrDesain']['name'];
		$id = $this->input->post('KdDesain');
		$pola = $this->input->post('KdDesain');

		$this->_rules();
		if ($this->form_validation->run() == true) {
			if ($upload_image) {
				$config['upload_path'] = './assets/img/design/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';

				$this->load->library('upload', $config);
				if ($this->upload->do_upload('GbrDesain')) {
					$old_image = $data['design']['GbrDesain'];
					if ($old_image != 'default.jpg') {
						$hapus = 'assets/img/design/'. $old_image;
						$unlink = unlink(FCPATH .  'assets/img/design/'. $old_image);
						if ($hapus == $unlink) {
							unlink(FCPATH .  'assets/img/design/'. $old_image);
						}
					}

					$new_image = $this->upload->data('file_name');
					$datainsert['GbrDesain'] = $new_image;
				}else{
					echo $this->upload->display_errors();
				}
			}
			
			$datainsert['KdPola'] = $this->input->post('KdPola',TRUE);
			$this->Design_model->update($this->input->post('KdDesain',TRUE), $datainsert);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data desain Berhasil Ditambah!</div>');
			redirect('Design');	
		}else{
			$this->index();
		}
	}