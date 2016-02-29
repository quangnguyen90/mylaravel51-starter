<?php

namespace App\Http\Controllers;
use App\Articles;
use Illuminate\Http\Request;

// Doi tuong request de lay du lieu
use App\Http\Requests;
// Kiem duyet tai class khac, ke thua tu Request
use App\Http\Requests\CheckArticlesRequest;
use App\Http\Controllers\Controller;
// Kiem ra Date
use Carbon\Carbon;
// Kiem duyet ngay tai ham controller
use Illuminate\Support\Facades\Validator;

class ArticlesController extends Controller {
 
	// default controller of article
	public function index(){
	  //code mới, chỉ lấy các bài viết từ thời điểm hiện tại trở về trước
	  $articles = Articles::latest('created_at')->where('created_at', '<=', Carbon::now())->get();
	  return view("articles.articles")->with("articles", $articles);
	}

	public function getAll_view(){
		// =================> TRA RA VIEW co kem thong tin
 		$articles = Articles::all();
 		//           thu muc . ten file view
		return view("articles.articles")->with("articles", $articles);
	}

	public function getAll_json(){
		// =================> TRA RA JSON
		$articles = Articles::all();
	 	return $articles;
	}

	public function create(){
	    return view("articles.create");
	}

	public function store_cach1_luu_tung_truong_data(Request $request){
		// =================> Lay du lieu tu view va tra ra JSON
		// $dulieu_tu_input = $request->all();
		// return $dulieu_tu_input;

		// =================> Lưu lại trong DB
		// Lay du lieu to post
		$dulieu_tu_input = $request->all();
		//Gọi model Articles.php đã được tạo ra ở các bài trước
		$articles = new Articles;

		//Lấy thông tin từ các input đưa vào thuộc tính name, author
		//trong model Articles
		$articles->name = $dulieu_tu_input["name"];
		$articles->author = $dulieu_tu_input["author"];

		//Tiến hành lưu dữ liệu vào database
		$articles->save();

		//Sau khi đã lưu xong, tiến hành chuyển hướng tới route articles
		//hiển thị toàn bộ thông tin bảng articles trong database đã được tạo ở các bài trước
		return redirect('articles');
	}

	public function store_cach2_ko_kiem_duyet(Request $request){
        // lấy dữ liệu từ form
		$dulieu_tu_input = $request->all();
 
        //dùng hàm create của laravel 5 để đưa hết thông tin lấy từ input và lưu vào trong database
		Articles::create($dulieu_tu_input);
 
        // chuyển hướng người dùng đến trang hiển thị danh sách bài viết
		return redirect('articles');
	}
	
	public function store_cach3_kiem_duyet_tai_controller(Request $request)
	{
		$dulieu_tu_input = $request->all();
		$validator = Validator::make(
		$dulieu_tu_input,
		[
			'name' => 'required|min:6',
			'author' => 'required',
			'created_at' => 'required|date'
		]
		);
		if ($validator->fails())
		{
		return redirect()->back()->withErrors($validator->errors());
		}
		else echo 'success';
	}

	public function store(CheckArticlesRequest $request){ // truyền đối tượng CheckArticlesRequest
		// lấy dữ liệu từ form
	  $dulieu_tu_input = $request->all();

		//dùng hàm create của laravel 5 để đưa hết thông tin lấy từ input và lưu vào trong database
	  Articles::create($dulieu_tu_input);

		// chuyển hướng người dùng đến trang hiển thị danh sách bài viết
	  return redirect('articles');
	}

	public function edit($id){//truyền mã id của article
       	//Tìm article thông qua mã id tương ứng
	    $article = Articles::findOrFail($id);
       
       	// Gọi view edit.blade.php hiển thị bải viết
	    return view('articles.edit',compact('article'));
	}

	public function update($id , Request $request){
		
		$articles = Articles::findOrFail($id);
 
		$articles->update($request->all());
 
        return redirect('articles');
	}


}
