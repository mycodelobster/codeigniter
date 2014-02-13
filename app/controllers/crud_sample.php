public function __construct()
	{
		parent::__construct();
		$this->load->model('product_model','product');
	}

	public function index()
	{
		$this->listing();
	}

	public function add()
	{
		$this->form_validation->generate(array('name','description'));
		if($this->form_validation->run())
		{
			$add_product = array(
				"product_name" => $this->input->post('name',TRUE),
				"product_desc" => $this->input->post('description',TRUE)
				);
			if($this->product->insert($add_product))
			{
				set_success("Success");
				redirect(base_url("panel/product/add"));
			}
		}
		$data['var'] = array();
		$this->load->view('product/add',$data);
	}

	public function listing()
	{	
		$data['product_listing'] = $this->product->get_all();
		$this->load->view('product/listing',$data);
	}

	public function show($product_id = NULL)
	{
		$data['product'] = $this->product->get(product_id);
		$this->load->view('product/show',$data);
	}	

	public function update($product_id = NULL )
	{
		$this->form_validation->generate(array('name','description'));
		if($this->form_validation->run())
		{
			$product = array(
				"product_name" => $this->input->post('name',TRUE),
				"product_desc" => $this->input->post('description',TRUE)
				);
			if($this->product->update($product_id, $product))
			{
				set_success("Success");
				redirect(base_url("panel/product/update/$product_id"));
			}
		}
		$data['product'] = $this->product->get($product_id);
		$this->load->view('product/update',$data);
	}

	public function delete($product_id=NULL )
	{
		$this->product->delete($product_id);
		redirect(base_url("panel/product"));
	}
