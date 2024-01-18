<?php 
date_default_timezone_set("Asia/Taipei");  // 設定預設時區為亞洲/台北
session_start();  // 啟動 PHP Session
class DB{

    protected $dsn = "mysql:host=localhost;charset=utf8;dbname=bquiz";
    // 資料庫連線設定，包括主機名、編碼方式、資料表名稱(適時調整)
    protected $pdo;  // PDO 實例
    protected $table;  
    
    public function __construct($table) // 建構式就是初始化，類別宣告出來第一件做的事
    {
        $this->table=$table; // 設定資料表名稱，將物件內部的table值設為帶入的$table
        $this->pdo=new PDO($this->dsn,'root','');  // 透過 PDO 建立資料庫連線
    }


    function all( $where = '', $other = ''){
        $sql = "select * from `$this->table` ";  // 基本的 SQL 查詢語句
        $sql =$this->sql_all($sql,$where,$other);  // 處理額外的條件和語句
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        // 執行查詢並回傳結果陣列
    }

    function count( $where = '', $other = ''){
        $sql = "select count(*) from `$this->table` ";  // 計算資料表中的記錄總數
        $sql=$this->sql_all($sql,$where,$other);  // 處理額外的條件和語句
        return $this->pdo->query($sql)->fetchColumn();  // 執行查詢並回傳結果的"列數"
    }
    private function math($math,$col,$array='',$other=''){
        $sql="select $math(`$col`)  from `$this->table` ";  // 執行數學函數操作（如sum、max、min）
        $sql=$this->sql_all($sql,$array,$other);  // 處理額外的條件和語句
        return $this->pdo->query($sql)->fetchColumn();  // 執行查詢並回傳結果
    }
    function sum($col='', $where = '', $other = ''){
        return  $this->math('sum',$col,$where,$other);  // 計算指定欄位的總和
    }
    function max($col, $where = '', $other = ''){
        return  $this->math('max',$col,$where,$other);  // 取得指定欄位的最大值
    }  
    function min($col, $where = '', $other = ''){
        return  $this->math('min',$col,$where,$other);  // 取得指定欄位的最小值
    }  
    
    function find($id){
        $sql = "select * from `$this->table` ";  // 查詢所有欄位的資料
    
        if (is_array($id)) {
            $tmp = $this->a2s($id);  // 將陣列轉換成 SQL 條件語句的一部分
            $sql .= " where " . join(" && ", $tmp);  // 加入條件
        } else if (is_numeric($id)) {
            $sql .= " where `id`='$id'";  // 以 id 為條件查詢
        } else {
            echo "錯誤:參數的資料型態比須是數字或陣列";
        }
        //echo 'find=>'.$sql;
        $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
        // 執行查詢並回傳結果
        return $row;
    }
    
    function save($array){
        if(isset($array['id'])){
            $sql = "update `$this->table` set ";  // 編輯資料
    
            if (!empty($array)) {
                $tmp = $this->a2s($array); // 將陣列轉換成 SQL 語句的一部分
            } else {
                echo "錯誤:缺少要編輯的欄位陣列";
            }
        
            $sql .= join(",", $tmp); // 串接 SQL 語句
            $sql .= " where `id`='{$array['id']}'";  // 以 id 為條件
        }else{
            $sql = "insert into `$this->table` "; // 新增資料
            $cols = "(`" . join("`,`", array_keys($array)) . "`)";
            // 取得所有欄位名稱
            $vals = "('" . join("','", $array) . "')"; // 取得所有欄位的值
        
            $sql = $sql . $cols . " values " . $vals; // 串接 SQL 語句
        }

        return $this->pdo->exec($sql);  // 執行 SQL 語句
    }

    function del($id)
    {
        $sql = "delete from `$this->table` where ";  // 刪除資料
    
        if (is_array($id)) {
            $tmp = $this->a2s($id);  // 將陣列轉換成 SQL 條件語句的一部分
            $sql .= join(" && ", $tmp); // 加入條件
        } else if (is_numeric($id)) {
            $sql .= " `id`='$id'";  // 以 id 為條件
        } else {
            echo "錯誤:參數的資料型態比須是數字或陣列";
        }
        //echo $sql;
    
        return $this->pdo->exec($sql);  // 執行 SQL 語句
    }
    
    /**
     * 可輸入各式原生SQL語法字串並直接執行，例如更複雜的，子查詢和聚合函數等等
     * q=query
     */
    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        // 執行輸入的 SQL 語句，一次取回多筆
    }

    private function a2s($array){
        foreach ($array as $col => $value) {  // 使用 foreach 遍歷陣列，將每個鍵值對串接到 $tmp 陣列
            $tmp[] = "`$col`='$value'"; // 將"陣列"轉換成 SQL 語句的一部分
        }
        return $tmp;  // 返回包含所有鍵值對轉換成的 SQL 語句片段的陣列
    }

    private function sql_all($sql,$array,$other){

        if (isset($this->table) && !empty($this->table)) {
    
            if (is_array($array)) {
    
                if (!empty($array)) {
                    $tmp = $this->a2s($array);  // 將陣列轉換成 SQL 條件語句的一部分
                    $sql .= " where " . join(" && ", $tmp); // 加入條件
                }
            } else {
                $sql .= " $array";  // 加入其他的 SQL 語句
            }
    
            $sql .= $other; // 加入其他的 SQL 語句
            // echo 'all=>'.$sql;
            // $rows = $this->pdo->query($sql)->fetchColumn();
            return $sql;
        } else {
            echo "錯誤:沒有指定的資料表名稱";
        }
    }

}

// dd跟資料庫沒有關係，放在外面。
// 另一種全域function的應用，整個程式都可以用的，不屬於任何一個物件
// 整個系統都可以用到的
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


$Que=new DB('que');
// 創建一個 DB 實例，資料表名稱為 'que'

?>