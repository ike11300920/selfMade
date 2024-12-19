<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class forumsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $params = [
            [
                'user_id' => '1',
                'title' => 'エレコム製 Webカメラ 雑レビュー',
                'image' => 'vVDyamaOfWCGtL7sqhFMcXHaqVhKUSEEiJhQAhF4.jpg',
                'discussion' => 'このスペックで4000円以下(購入当時)なのはさすがにちょっと怖かった 今は少し値が戻って4500円くらい？です。 販売元をAmazon公式にすると7000円くらいです。(それでも安い気がする…) ・1080pで60fps対応(強い) ・3種類のライト機能(暗い部屋ゲーマーなので手元を明るく写せるのはあまりにも良い) ・オートフォーカス機能付き(正直これはオフにしたいかも) ・可動域の広さ(横360度、縦200度ほど回転できる) ・プライベートシャッター(レンズ周りの黒縁を回すだけ)',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '2',
                'title' => 'ARTISAN 99式 - ENGレビュー',
                'image' => '4DVkLA0St7nmRTYWYbjoATvoc1zr66UtrEKWqcQy.jpg',
                'discussion' => '軽い力で撫でればかなり滑らか。しかし、下向きの圧力をかけると、ザラつきを強く感じる。アームスリーブを着用するときも、マウスパッドに圧力をかけながら滑らせるとかなり引っかかる。 零と違い、表面にホコリや毛が張り付く心配はなさそうだ。 X/Y軸による滑りの違いは存在するが、ごくわずか。 色による滑りの変化はごくわずか。好きな色を選ぼう。',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '1',
                'title' => 'WALLHACK SY-001簡易レビュー',
                'discussion' => '2024年5月4日現在Amazonセールで5,850円で買えるWALLHACK（旧SKYPAD）の布マウスパッド セール無しの状態だと9,000円で売ってた 様々なレビュー動画などでSaturn Proに似ているとあり、ミオニさんのレビューでも表面がSaturn Proと同じ織り方と説明されていた 値段が高くて買うのを躊躇っていた所セールが来た。 しかも2枚買えばさらに5%offのクーポンが付いてくる つまり定価9,000円のマウスパッドが11,115円で2枚買える 意味が分からない定期的に開催してほしい。 操作感🥰 2023 Saturn Pro softです、ただ若干硬め Artisan零mid（持ってるArtisan midが零しかない） ほどではないけど2023年版Saturn Pro softよりは硬い 零midかSaturn無印、Saturn Pro softを愛用しているので 力を入れてストッピングする癖がないためか違いが分からない 鈍感な自分はこれをSaturn Proと言われて渡されても指で押し込まないと気付かない Saturn Proは供給が安定していないし Saturn無印に至っては国内での取扱がない（多分） Saturn Proしか使えねー！という人ならセール中の今こそ買うしかないかもしれない Saturn Proってええんか！？って人もセール中の今買うとお得 セールが終わってしまっても国内からSaturn Proを海外サイトで買うよりは割安かもしれない 操作感以外のレビューはミオニさんのレビューが参考になると思います あくまでも自分はSaturn Proが好きなので本当に似てるのか気になって買いました',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '1',
                'title' => 'scyrox V8が接続できなくなった',
                'image' => 'd9pFun7XcqhUhuBVMmjXh29WixQSPJqlNIp8NnB6.jpg',
                'discussion' => '11月頭に購入したscyrox V8が、急に無線接続できなくなりました USBケーブル、ポートを変更してもドングルが認識されません マウス自体は有線接続で認識されるのでドングル側の問題だと思っています scyrox V8で同様の事象が発生した方、別のマウスでもドングルの不具合解消された方いましたらご教示ください',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '2',
                'title' => 'おすすめの中華イヤホンを教えてください！',
                'image' => 'G8T01QbvIREdNFpONKvcJLUQk9tN2Y5bexMYTxVS.jpg',
                'discussion' => '主な用途はゲーム、音楽制作、音楽鑑賞です。音楽はブレイクコアばかりなのでドラムベースと相性が良いやつがあれば教えてほしいです。 予算は2万以下を考えています。最近出ているイヤホンの知識は全然無いので皆様のオススメを教えていただければと思います🙏',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '1',
                'title' => 'X-raypad custom',
                'image' => '1zPxWfOquGKRc6WDYH6AUBddsb3ZVRk251rZbnPO.jpg',
                'discussion' => 'X-raypadのカスタムマウスパッドを注文したので、注文の仕方、注意点、感想をまとめようと思います。 X-raypad Thor を購入しようとしましたが、せっかくなら自分の好みの柄がいいと思い、カスタムマウスパッドを購入しようと思いました',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '2',
                'title' => 'Wraith Sense Pro IEMの簡易レビュー',
                'discussion' => '【総評】 この価格帯はオーディオメーカー同士の価格競争が激しいこともあってか、このIEMの立ち位置は正直微妙という評価 価格帯の中で秀でたものもなく、どちらかというと悪い部分のほうが目立つ FPSでの利用は使えなくはないが、予算5000円なら他に選択肢はたくさんあると思う 少なくとも音楽を聴く目的で買うべきではない 装着感については合う人と合わない人がハッキリする形状であるため、 ユニバーサルフィットみたいな感じではない また、合わない場合は耳介部分を痛める可能性が高いため、万人受けする形状ではないことは確か しかしながら、初めての製品と考えれば決して悪いとは思わず、 全体的なスッキリとした音はモニター寄りな音作りはちゃんと目指していると感じるため、 装着感等の欠点を克服したうえで次回作につなげてほしい',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '2',
                'title' => 'キーキャップについて',
                'image' => 'pWRQ2ug352eflu9w6yNXkMYjoajKya7PwQFk6xa9.jpg',
                'discussion' => 'グレーを基調としたおすすめのキーキャップを教えていただきたいです。またキーキャップを買う際に注意するべき点や使っているサイトや知りたいです。',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '1',
                'title' => 'Dragonfly R1 pro使用者にオススメのマウスを教えてください🙇',
                'image' => 'WzKDBWEYW34N1Nklw1mnW9ITRPk0UBVPbJsvAasj.jpg',
                'discussion' => 'つかみ持ち？、1万数千円の価格帯でR1 pro使用者にオススメのマウスを教えてください。 現在までR1 proを1年ほど使ってきました。 ブラックフライデーのうちに新しいマウスを購入したいと考えています。 持ち方は添付の写真の感じです。',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'user_id' => '2',
                'title' => 'サブPCキーボード',
                'discussion' => 'サブPCのキーボードが壊れたので買い直したいのですが、ワイヤレスでメカニカル、コスパが良いが条件のキーボードはないでしょうか？',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ];

        foreach ($params as $param) {
            DB::table('forums')->insert($param);
        }
    }
}
