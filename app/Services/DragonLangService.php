<?php 
// app/Services内がロジック記述場所。
// ドラゴン語のロジックのコンストラクタがここになる。ここで外部apiとやり取りして別言語で記述するか、phpでServicesフォルダ直下にファイル、フォルダ追加して管理するかは任せる。
// また、jsからget/postリクエスト送る形でもよい
// 実際のドラゴン語表示部分はttfファイルを使う。
// 基本的にアルファベットはすべて小文字で統一することで表示の崩れがなくなる
// 翻訳例：ゆるぎなき力 → fus ro d4
namespace App\Services;
class DragonLangService{
  
}