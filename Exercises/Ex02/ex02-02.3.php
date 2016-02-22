<?php
    /*
     * 演習02-2
     * 1から1000までの素数を表示する
     * 
     * 以下の定理を使うと処理の高速化が可能
     *  自然数 N を自然数 Ｌ ( ただし 2≦Ｌ≦(Ｎの平方根 )で割ったとき、割り切れなければ、Ｎは素数である。
     * この定理は、
     * 「平方根以上の約数は自身の値のみ」という解釈が可能となるので、素数の探索を自身の約数までに短縮する
     *  ことが可能となり、処理の高速化が期待できます。
     * 
     * このように、素数の探索アルゴリズムは数学的に興味深い分野となっており、様々なアルゴリズムが存在します。
     * 素数判定の代表的なアルゴリズムとしては、「エラトステネスのふるい」があります。
     *  http://www.math-konami.com/lec-data/ho02.pdf
     *  https://ja.wikipedia.org/wiki/%E3%82%A8%E3%83%A9%E3%83%88%E3%82%B9%E3%83%86%E3%83%8D%E3%82%B9%E3%81%AE%E7%AF%A9
     *  
     * 素数判定については、大学等の講義でも取り上げられているので、Webを検索すると様々な情報が得られます。
     *  http://www.elc.ees.saitama-u.ac.jp/ProgrammingI/No02-6.pdf
     *  http://www.ipa.go.jp/files/000013662.pdf
     */
function isPrime2($n)
{
    $i=2;
    $sn = sqrt($n);
    for(; $i<=$sn; $i++) {
        if($n%$i == 0) {
            return FALSE;
        }
    }
    return TRUE;
}

    // Start
    $start_time = microtime(TRUE);
    $primenum = array();
    $primenum[] = 2;
    for($i=3; $i<=1000; $i+=2) {
        if(isPrime2($i) == TRUE) {
            $primenum[] = $i;
            // echo $i." , ";
        }
    }
    echo microtime(TRUE) - $start_time;
    echo PHP_EOL;
    echo "Total primenumber is ".count($primenum);  // 配列の要素数を調べる：count()
    echo PHP_EOL;
    

?>
