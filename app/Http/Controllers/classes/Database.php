<?php
namespace App\Http\Controllers\classes;
use App\Http\Controllers\DatabaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;


class Database{
	//$jokesTable->pdo = '문자열'; 이런경우를 대비해서 private
	public $table;
	public $primaryKey;
	//클래스 생성자 정의에 인수가 있고 기본강ㅄ이 없으면, 인스턴스를 생성할 때 반드시
	//인수를 전달해야 한다. 그렇지 않으면 오류가 발생한다.
	//메서드를 호출하기 전에 변수가 설정되지 않거나 $pdo 변수에 문자열이 지정되거나 이런 오류를 없애기 위해 생성자 사용한다.
	//__construct($pdo, $table, $primaryKey)에 있는 $pdo는 함수 인수. 함수인수는 해당 함수 안에서만 쓸 수 있고 다른 함수에서 접근할 수 없다
	//생성자 안에서 클래스 변수에 값을 할당해야 한다.
	//생성자 인수 정의에 따라 DatabaseTable 인스턴스를 만들때 다음과 같이 3가지 인수를 제공해야한다
	//$jokesTable = new DatabaseTable($pdo, 'joke', 'id');
	public function __construct($table = [] , $primaryKey= [])
	{
		$this->table = $table;
		$this->primaryKey = $primaryKey;

	}
    public function appModel() {
		// return print($this->table);
        $appModel = '\App\\'.$this->table;
        return $appModel;
    }

    //테이블의 모든 열 검색
	public function findAll()
	{
		$models = $this->appModel()::get();
		
		return $models;
	}

	//PK로 열검색
	public function findById($value) {
        $Id = $this->appModel()::where($this->primaryKey, $value)->first();
		return print($Id);
		// print_r($query->fetch());
	}
	private function insert(Request $request) {
			$modelRoute = '\App\\'.$this->table;
            $model = new $modelRoute;
            foreach ($request->names as $name => $value){
				$model->$name = $value;
            }
            $model->save();
	}

	private function update(Request $request) {
		$modelRoute = '\App\\'.$this->table;

		$model = $modelRoute::find($request->names['Id']);
		$names = $request->names;
		//해당 배열삭제
		unset($names['Id']);
		foreach ($names as $name => $value){
			$model->$name = $value;
		}
		$model->save();
	}

	// 전체글 개수를 확인
	public function total() {
		$query = $this->query('SELECT COUNT(*) FROM `' . $this->table . '`');
		$row = $query->fetch();

		return $row[0];
	}


	//삭제
	public function delete(Request $request){
		$modelRoute = '\App\\'.$this->table;
		$model = $modelRoute::find($request->names['Id']);
		$model->delete();
	}


	//날짜 형식 처리
	public function processDates($fields) {
		foreach ($fields as $key => $value) {
			if ($value instanceof \DateTime) {
				$fields[$key] = $value->format('Y-m-d H:i:s');
			}
		}

		return $fields;
	}

	public function save(Request $request)
	{
		try{
			$this->insert($request);
		}
		catch (Exception $e){
			$this->update($request);
		}
	}

}
