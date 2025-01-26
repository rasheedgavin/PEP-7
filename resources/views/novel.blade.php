<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One-Page Novel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body class="flex flex-col justify-between min-h-screen bg-body-gradient text-cream">

    <header class="py-6 shadow-lg bg-header-gradient">
        <div class="absolute top-4 left-4 fade-in">
            <button onclick="window.location='{{ route('dashboard') }}'"
                class="flex items-center px-4 py-2 space-x-2 transition rounded-full shadow-lg btn-gradient text-dark">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 19l-7-7 7-7v14zm4-14h8v14h-8V5z"/>
                </svg>
                <span>Back</span>
            </button>
        </div>

        <div class="container px-6 mx-auto text-center">
            <h1 class="text-5xl font-bold tracking-wide uppercase text-gold fade-in">
                Ibong Adarna
            </h1>
            <p class="mt-2 text-lg italic text-cream fade-in">
                Lakbayin ang panahon, isang kabanata sa bawat paglalakbay
            </p>
        </div>
    </header>


    <main class="container relative px-6 py-12 mx-auto fade-in">

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in active" id="chapter1">
            <h2 class="flex text-3xl font-bold text-gold">Kabanata 1: Ang Kahariang Berbanya</h2>
            <p class="mt-4 text-3xl text-cream">Ang kaharian ng Berbanya ay tanyag bilang isang sagana at may payapang pamumuhay. Ang mga piging at pagdiriwang ay madalas na
                idinaraos sa kaharian ng Berbanya dahil masayahin ang hari’t reyna na namumuno dito na sila Don Fernando at Donya Valeriana.
                Sila ay may tatlong lalaking mga anak na sina Don Pedro, Don Diego, at si Don Juan. Ang tatlong prisipe na ito ay likas na magagaling at
                matatalino higit kanino pa man sa buong kaharian. Nagsanay ang tatlo sa paghawak ng mga sandata at patalim sa pakikipaglaban ngunit isa
                lang sa kanila ang maaaring mahirang bilang tagapagmana ng kaharian.
                Hindi maikakaila na paborito ni Don Fernando ang bunsong anak na si Don Juan kaya namayani ang inggit ng panganay na si Don Pedro sa
                kapatid.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter2">
            <h2 class="text-3xl font-bold text-gold">Kabanata 2: Ang Karamdaman ni Don Fernando </h2>
            <p class="mt-4 text-3xl text-cream">
                Nagkaroon ng malubhang karamdaman si Don Fernando buhat sa isang bangungot. Sa kaniyang panaginip ay nakita niya ang bunsong
anak na si Don Juan na pinaslang ng dalawang buhong at inihulog sa malalim na balon.
Dahil sa pag-aalala ay hindi na nakatulog at nakakain ng maayos ang hari magmula noon hanggang sa ito’y maging buto’t-balat na. Maging
ang asawa at mga anak ng Don ay nabahala na din dahil walang sinuman ang makapagbigay ng lunas sa sakit ng hari.
Isang medikong paham ang dumating sa kaharian na naghayag na ang tanging lunas sa sakit ng hari ay ang awit ng isang ibon na makikita sa
bundok ng Tabor sa may kumikinang na puno ng Piedras Platas. Ang ibon na ito ay matatagpuan lamang tuwing gabi dahil ito ay nasa burol
tuwing araw.
Nang malaman ang tungkol sa lunas ay agad nag-utos ang pinuno ng monarka sa panganay na si Don Pedro upang hanapin at hulihin ang
Ibong Adarna.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter3">
            <h2 class="text-3xl font-bold text-gold">Kabanata 3: Ang Paglalakbay ni Don Pedro</h2>
            <p class="mt-4 text-3xl text-cream">
                Inabot ng tatlong buwan ang paglalakbay ni Don Pedro bago tuluyang matunton ang daan paakyat sa Bundok ng Tabor. Hindi naglaon
ay natagpuan din ni Don Pedro ang Piedras Platas.
Dumating ang laksa-laksang ibon ngunit wala sa mga ito ang dumapo sa kumikinang na puno. Nakatulog si Don Rafael habang nag-iintay sa
pagdating ng Ibong Adarna.
Di nito namalayan ang pagdating ng ibon. Pitong ulit na umaawit ang Ibong Adarna at pitong ulit rin nagpapalit ng kulay ang kaniyang
balahibo
Nakasanayan na ng ibon ang dumumi bago matulog. Pumatak ang dumi ng ibon sa noo’y natutulog na si Don Pedro. Sa isang iglap ay naging
isang bato ang prinsipe ng Berbanya.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter4">
            <h2 class="text-3xl font-bold text-gold">Kabanata 4: Ang Kabiguan ni Don Pedro</h2>
            <p class="mt-4 text-3xl text-cream">
                Dahil sa nangyari ay hindi na nakabalik ng kaharian ng Berbanya si Don Pedro.
Inatasan ni Don Fernando ang ikalawang anak na si Don Diego na hanapin ang nawawalang kapatid at hulihin ang Ibong Adarna. Naglakbay si
Don Diego ng mahigit limang buwan bago nito tuluyang marating ang Piedras Platas.
Nagpapahinga ito sa isang bato doon nang biglang dumating ang Ibong Adarna. Nasaksihan ng kaniyang mga mata ang pitong beses na pagawit at pagpapalit ng kulay ng balahibo ng ibon.
Hindi nito naiwasang makatulog dahil sa lamyos ng tinig ng mahiwagang ibon. Napatakan muli ng dumi ng ibon si Don Diego dahilan kung
bakit naging bato rin ito.
Parang isang libingan ang ilalaim ng puno ng Piedras Platas dahil sa dalawang prinsipe na kapwa naging bato.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter5">
            <h2 class="text-3xl font-bold text-gold">Kabanata 5: Ang Paglalakbay ni Don Juan </h2>
            <p class="mt-4 text-3xl text-cream">
                Tatlong taon na ang lumipas ay hindi pa rin nakakabalik ang magkapatid na prinsipe samantalang lalong lumubha naman ang sakit ng
hari. Atubiling inutusan ni Don Fernando si Don Juan na hanapin ang mga kapatid nito at hulihin ang Ibong Adarna. Humingi ng bendisyon si
Don Juan upang payagan ito na umalis para hanapin ang mga kapatid at ang natatanging lunas sa ama.
Di katulad ng naunang magkapatid, hindi gumamit si Don Juan ng kabayo sa halip ay naglakad lang ito. Naniniwala ang prinsipe na kusang
dadating ang biyaya sa kanya kung mabuti ang kaniyang hangarin.
Nagbaon siya ng limang tinapay at kumakain lamang tuwing makaisang buwan. Panay ang usal niya ng panalangin upang makayanan ang
hirap. Apat na buwan na siyang naglalakbay at tumigas na ang natitirang baon na tinapay.
Paglao’y narating ni Don Juan ang kapatagang bahagi ng bundok Tabor. Doon ay natagpuan niya ang isang leprosong matandang lalaki.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter6">
            <h2 class="text-3xl font-bold text-gold">Kabanata 6: Ang Leprosong Ermitanyo</h2>
            <p class="mt-4 text-3xl text-cream">
                Humingi ng limos ang ermitanyo kay Don Juan. Ibinigay ng prinsipe ang natitirang tinapay sa matanda. Nagbilin ang ermitanyo kay Don
Juan nang malaman nito ang pakay ng binata.
Hinabilin ng matanda na huwag masisilaw sa kinang ng puno sa halip ay tumingin sa ibaba upang makita ang isang dampa. Doon ay
matatanaw ni Don Juan ang isang pang ermitanyo na siyang makakatulong sa paghahanap ng lunas sa may sakit.
Nang marating ni Don Juan ang Piedras Platas ay muntik nang malimutan nito ang bilin ng leprosong ermitanyo dahil sa pagkamangha sa
kaniyang nasaksihan. Muli lang nagbalik ang kanyang diwa nang makita niya ang dampa.
Narating ni Don Juan ang dampa at nakita ang tinapay na ibinigay niya sa leprosong ermitanyo. Dito ay nalaman ng prinsipe na isang
engkantado ang Ibong Adarna. Ito ay masisilayan lamang tuwing gabi, pitong beses na umaawit at pitong beses din kung magpalit ng kulay ng
balahibo.
Bilin ng ermitanyo na sa oras na umawit ang Ibong Adarna ay kailangan niyang hiwain ang palad at pigaan ng dayap upang mapaglabanan ang
antok. Binigyan din nito ang binata ng sintas na ginto upang gamiting panghuli at panggapos sa ibon.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter7">
            <h2 class="text-3xl font-bold text-gold">Kabanata 7: Ang Ibong Adarna</h2>
            <p class="mt-4 text-3xl text-cream">
                Nakapuwesto si Don Juan sa ilalim ng Piedras Platas. Hindi siya napagod sa pag-iintay kung kaya’t nasaksihan niya ang taglay na gilas
at kariktan ng Ibong Adarna. Umawit ito at nagpalit na ang kulay ng kanyang mga balahibo.
Nang marinig ang awit ng ibon ay humikab si Don Juan. Ginawa niya ang bilin ng ermitanyo na hiwain ang palad at pigaan ng dayap ang sugat.
Nawala ang nararamdaman niyang antok dahil sa sakit ng kanyang sugat. Nagkaroon ng pitong sugat si Don Juan katumbas ng pitong awit ng
Ibong Adarna.
Muling dumumi ang ibon at naiwasan naman ito ng prinsipe. Nang makatulog ang ibon ay marahan na umakyat sa puno si Don Juan at agad
na sinunggaban ang ibon pang maitali gamit ang gintong sintas.
Dinala ni Don Juan ang ibon sa dampa habang ang ermitanyo naman ang nagkulong sa hawla.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter8">
            <h2 class="text-3xl font-bold text-gold">Kabanata 8: Ang Pagligtas kay Don Diego at Don Pedro</h2>
            <p class="mt-4 text-3xl text-cream">
                Nag-utos ang ermitanyo kay Don Juan na kumuha ng banga at punuin ito ng tubig para ibuhos sa mga kapatid niyang naging bato. Agad
namang sumunod si Don Juan sa pinag-uutos ng ermitanyo.
Sumalok siya ng tubig at nagtungo sa kaniyang mga kapatid. Unang binuhusan ni Don Juan ang batong si Don Pedro at agad itong nabuhay.
Tumayo si Don Pedro at niyakap ang bunsong kapatid. Sumunod namang binuhusan nito si Don Diego at naging tao itong muli.
Nagyakapan ang tatlong prinsipe at labis na nagalak dahil sa wakas ay gagaling na ang kanilang ama dahil sa nahuli ni Don Juan ang Ibong
Adarna. Muling nagtungo ang tatlo sa dampa ng ermitanyo at doo’y nagkaroon ng piging.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter9">
            <h2 class="text-3xl font-bold text-gold">Kabanata 9:  Ang Mahiwagang Katotohanan</h2>
            <p class="mt-4 text-3xl text-cream">
                Agad na gumaling ang mga sugat sa palad ni Don Juan matapos itong pahiran ng gamot ng ermitanyo. Muling namangha si Don Juan sa
hiwagang ipinamalas ng nito.
Nagbilin ang ermitanyo sa tatlong prinsipe na nawa’y makarating sila ng payapa alang-alang sa kanilang amang hari. Nagbilin din ito na huwag
sanang paglililo ang manahan sa kanilang mga puso.
Sa kanilang pag-uwi ay nauunang naglalakad si Don Juan dala-dala ang hawla. Habang nasa likod naman nito ang dalawa pa niyang kapatid.
Palihim na kinakausap ni Don Pedro si Don Diego.
Dahil sa sobrang inggit nito kay Don Juan, binalak ni Don Pedro na patayin ang kaniyang bunsong kapatid ngunit ito ay tinutulan ni Don Diego.
Sa halip na patayin ay napagkasunduan ng dalawa na bugbugin nalang si Don Juan. Sa kagubatan na ito aabutan ng kamatayan at madadala
pa nila ang Ibong Adarna sa kaharian ng Berbanya.
Hindi nanlaban si Don Juan kahit pa siya ang pinagtutulungan na bugbugin ng dalawa niyang kapatid. Iniwan ng magkapatid si Don Juan na
nakagulapay sa gitna ng kagubatan. Tumakas sila tangay ang Ibong Adarna.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter10">
            <h2 class="text-3xl font-bold text-gold">Kabanata 10:  Ang Pagtataksil nina Don Pedro at Don Diego</h2>
            <p class="mt-4 text-3xl text-cream">
                Bumalik ng palasyo ang magkapatid na sina Don Pedro at Don Diego. Bagama’t nakaratay parin ay pinilit ni Don Fernando na bumangon
upang mayakap ang dalawang anak na matagal nang nawalay sa kanya.
Nanlumo ito nang malaman na hindi kasama ng magkapatid ang bunsong anak na si Don Juan. Tinanong ng hari sa magkapatid kung nasan si
Don Juan ngunit ang tanging sagot nila ay hindi nila alam.
Iniharap ng magkapatid sa hari ang Ibong Adarna. Ngunit nabigla ito dahil pangit at lulugo-lugo ang itsura ng ibon.
Tiyak ng hari na sa itsura na iyon ng Ibong Adarna ay imbes na mapapagaling ng awit nito ang may sakit ay mas lalo pang lulubha. Sa pagaalala ay muling nanariwa ang panaginip ng hari tungkol sa kanyang bunsong anak na pinaslang ng dalawang buhong.
Lumipas ang mga araw at mas lalo pang lumubha ang sakit ng hari. Ang Ibong Adarna ay ayaw pa ring kumanta dahil wala ang totoong
nagmamay-ari sa kanya na si Don Juan.
Maging ang Ibong Adarna ay umaasa na buhay pa ang prinsipe at matutuklasan din ng hari at reyna ang pagtataksil na ginawa ng dalawa pa
nilang anak.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter11">
            <h2 class="text-3xl font-bold text-gold">Kabanata 11: Ang Panalangin ni Don Juan</h2>
            <p class="mt-4 text-3xl text-cream">
                Wala nang ibang pinagkukunan ng pag-asa si Don Juan kundi ang panalangin. Ipinalanagin niya sa Mahal na Birhen na humaba pa ang buhay
at gumaling ang amang may karamdaman.
Para kay Don Juan ay kaya niyang ibigay ang Ibong Adarna sa kaniyang mga kapatid kung ito ang hangad ng mga ito at hindi na ito dapat
pinagtaksilan pa.
Bagama’t naghihirap ay hindi niya nakalimutang sariwain ang kalagayan ng may sakit na ama, ang inang kaniyang labis na pinanabikan, ang
kahariang kinalakhan, at ang bayang kaniyang sinilangan.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter12">
            <h2 class="text-3xl font-bold text-gold">Kabanata 12: Ang Pagliligtas kay Don Juan</h2>
            <p class="mt-4 text-3xl text-cream">
                Biglang sumulpot ang matandang ermitanyo sa libis ng isang bundok. Doon niya natagpuang nakahandusay sa lupa si Don Juan.
Labis na nahabag ang ermitanyo sa sinapit ng prinsipe. Sa ikalawang pagkakataon ay muling ginamot ng matanda ang sugat ni Don Juan. Sa
isang iglap ay biglang naglaho ang mga sugat sa katawan ng prinsipe.
Namangha muli si Don Juan sa isang pang himala na nasaksihan niya. Niyakap nito ang matandang ermitanyo tanda ng kaniyang
pagpapasalamat dahil sa pagliligtas sa kaniyang buhay.
Pagkatapos ay inutos ng matanda na umuwi na si Don Juan sa palasyo upang iligtas ang amang hari. Madaling tinahak ng prinsipe ang daan
pabalik sa kaharian ng Berbanya.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter13">
            <h2 class="text-3xl font-bold text-gold">Kabanata 13: Ang Pagbabalik ni Don Juan</h2>
            <p class="mt-4 text-3xl text-cream">
                Sa wakas ay nakabalik na muli si Don Juan sa kaharian ng Berbanya. Namutla ang mukha nina Don Pedro at Don Diego nang nakita nila ang
bunsong kapatid.
Unang pinuntahan ng prinsipe ang nakaratay na ama at lumuhod ito sa harap ng hari. Umawit na rin ang Ibong Adarna at inilahad nito ang
buong katotohanan.
Habang nagpapalit ng kulay ng balahibo ay isinasalaysay ng ibon ang mga paghihirap ni Don Juan hanggang sa pagtataksil ng dalawa niyang
kapatid. Sa ikapitong awit ng ibon ay biglang nakatayo ang hari at nawala ang bakas ng karamdaman sa kaniya.
Sa labis na galak ng hari ay niyakap nito ang bunsong si Don Juan pati ang ibon. Iniutos naman ni Don Fernando sa mga kagawad ng palasyo
na ipatapon ang mga taksil niyang anak bilang parusa.
Nahabag naman si Don Juan sa kaniyang mga kapatid kaya lumuhod ito sa hari at inihingi ng tawad ang mga kapatid. Lumambot ang puso ng
hari dahil sa ginawa ni Don Juan kung kaya’t nagbago ang isip nito.
Ngunit binalaan nito ang dalawang prinsipe na sa susunod na magtaksil ito ay kamatayan ang magiging kaparusahan sa mga ito.
Masayang niyakap ni Don Juan ang dalawa niyang kapatid. Bumalik ang kasiyahan ng palasyo dahil sa paggaling ng hari.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter14">
            <h2 class="text-3xl font-bold text-gold">Kabanata 14: Ang Muling Pagtataksil</h2>
            <p class="mt-4 text-3xl text-cream">
                Giliw na giliw ang hari sa Ibong Adarna. Gabi-gabi kung ito’y dalawin ng hari.
Napagpasyahan ng hari na ipabantay ang Ibong Adarna sa mga anak upang hindi ito mawala o makatakas man. Nagbabala ang hari na
mananagot ang sinumang magpabaya sa ibon. Halinhinang nagbabantay ang magkakapatid.
Di naman sang-ayon si Don Pedro sa pagbabantay dahil siya ay isang prinsipe. Si Don Diego naman ay mabilis antukin at madalas na mainip sa
bagal ng oras habang nagbabantay. Habang si Don Juan naman ay idinadaan sa pagkausap sa Ibong Adarna upang hindi dalawin ng antok.
Muling nagbalak ng kataksilan ang dalawang magkapatid. Sa una’y hindi sumang-ayon si Don Diego ngunit napapayag din ito matapos
pangakuan ni Don Pedro na gagawin siyang kanang kamay kapag naging hari ito.
Nakatulog si Don Juan sa puyat at pagod dahil sa magkasunod na skedyul ng pagbabantay nito sa ibon. Habang natutulog ay sinamantala ng
dalawa niyang kapatid na pakawalan ang Ibong Adarna.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter15">
            <h2 class="text-3xl font-bold text-gold">Kabanata 15: Ang Muling Paglisan ni Don Juan</h2>
            <p class="mt-4 text-3xl text-cream">
                Madaling araw pa lang ay umalis na si Don Juan upang tumakas sa kaniyang ama. Batid niyang kailangan niyang magtago dahil sa
pagpapabaya sa Ibong Adarna.
Paggising ng hari ay agad itong nagtungo sa silid na kinaroroonan ng ibon. Nagulat ito nang matagpuang wala na ang ibon sa hawla. Nang
ipinatawag ng hari ang kaniyang mga anak dalawa lamang ang humarap sa kaniya.
Nagtangkang magsinungaling muli sina Don Pedro at Don Diego ngunit hindi sila agad pinaniwalaan ng hari. Ipinahanap ni Don Fernando si
Don Juan ngunit sawi itong matagpuan.
Ayon sa dalawa pang prinsipe ay nagtaksil si Don Juan at handa silang umalis upang hanapin ang nagtatagong bunsong kapatid.
Naglakbay sila kung saan-saan ngunit hindi nila natagpuan si Don Juan. Paglaon ay narating nila ang kabundukan ng Armenya kung saan
naroon si Don Juan.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter16">
            <h2 class="text-3xl font-bold text-gold">Kabanata 16: Ang Bagong Paraiso</h2>
            <p class="mt-4 text-3xl text-cream">
                Ang kabundukan ng Armenya ay paraiso sa kagandahan. Maraming hayop at pananim sa paligid. Maraming uri ng ibon ang nasa
himpapawid. Malinis at malinaw ang tubig sa batis. Walang magugutom sa lugar na iyon dahil sa mayamang kalikasan.
Sa lugar na ito naninirahan si Don Juan upang magtago at huwag maparusahan sa pagkawala ng Ibong Adarna. Nahihiya si Don Diego na
humarap kay Don Juan dahil sa nagawa na namang pagkakasala subalit dahil kay Don Pedro ay nahikayat nito na tumira sila doon kasama ni
Don Juan.
Pumayag naman si Don Juan sa panukala ni Don Pedro dahil sa mahal niya ang mga ito. Maligayang nanirahan ang magkakapatid sa
kabundukan ng Armenya.
Isang bahay na gawa sa kahoy ang naging tirahan nila doon. Lumipas ang panahon at napagpasyahan ng tatlo na tuklasin ang iba pang bahagi
ng Armenya na hindi pa nila nararating.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter17">
            <h2 class="text-3xl font-bold text-gold">Kabanata 17: Ang Mahiwagang Balon sa Armenya</h2>
            <p class="mt-4 text-3xl text-cream">
                Sa kanilang paglalakbay ay isang balon ang natuklasan ng magkakapatid. Ito ay may makikinis na marmol at ang lumot sa paligid nito ay may
gintong nakaukit.
Manghang-mangha ang magkakapatid sa nakita dahil sa lalim ng balon ay wala naman itong lamang tubig. May makikita din doon na lubid
para sa mga nais magtangkang bumaba.
Unang bumaba si Don Pedro bilang siya ang panganay ngunit dahil sa kadiliman ay hanggang tatlumpung dipa lamang ang kinaya nito.
Sumunod naman na bumaba si Don Diego ngunit hindi rin ito nagtagal sa ilalim.
Si Don Juan ang pinakahuling sumubok. Buong tapang nitong hinarap ang kadiliman sa balon. Malalim na ang narating nito ngunit patuloy pa
rin siya sa pagbaba.
Si Don Pedro at Don Diego ay nababahala at naiinip na sa kakaintay sa muling paglabas ni Don Juan.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter18">
            <h2 class="text-3xl font-bold text-gold">Kabanata 18: Ang Nakakaakit na si Donya Juana</h2>
            <p class="mt-4 text-3xl text-cream">
                Patuloy pa rin sa pagbaba si Don Juan hanggang sa marating niya ang pinakamalalim na bahagi ng balon. Namangha siya dahil isang
magandang hardin ang kaniyang nasaksihan.
Ito ang natatagong paraiso sa Armenya. Puno ng halaman at bulaklak sa paligid. Nagiging makulay at masamyo ang amoy ng kapaligiran dahil
sa mga ito.
Nakita ni Don Juan ang palasyo na yari sa ginto at pilak dahilan kung bakit ito nangingislap. Nasilayan din niya ang isang dalaga na diyosa sa
kagandahan. Siya ay si Donya Juana.
Di makapaniwala ang dalaga na narating ni Don Juan ang lugar na iyon. Lumuhod si Don Juan upang nagpakilala bilang prinsipe ng Armenya.
Humingi din ito ng paumanhin dahil sa mapangahas na pagpunta sa lugar na iyon.
Sumamo si Don Juan na tanggapin ng dalaga ang kaniyang pag-ibig. Hindi naman ito nasawi dahil inibig din siya ng dalaga.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter19">
            <h2 class="text-3xl font-bold text-gold">Kabanata 19: Ang Higanteng Bantay</h2>
            <p class="mt-4 text-3xl text-cream">
                Nagbabala si Donya Juana kay Don Juan na ang nagbabantay sa hardin ay isang malupit na higante. Maya-maya pa’y lumabas ang higante
dahil may naamoy daw ito na tao.
Laking tuwa ng higante dahil hindi na niya kinakailangang mamundok upang humanap ng makakain. Nagalit si Don Juan sa higante at hinarap
niya ito.
Nakipaglaban ang prinsipe gamit ang kaniyang matalas na espada hanggang sa matalo ang higante. Ayaw umalis ni Donya Juana sa lugar na
iyon hanggang di niya kasama ang bunsong kapatid na si Prinsesa Leonora.
Nakiusap ito kay Don Juan na iligtas ang kaniyang kapatid. Muling nagbigay ng babala si Donya Juana kay Don Juan dahil ang tagapagbantay
naman ni Prinsesa Leonora ay serpyente na may pitong ulo. Mas mabagsik ito kumpara sa higante dahil kahit tagpasin ang ulo ay muling
tutubo at mabubuhay ito.
Matatagpuan si Prinsesa Leonora sa di kalayuang palasyo na may malaking hagdanang ginto.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter20">
            <h2 class="text-3xl font-bold text-gold">Kabanata 20:  Ang Prinsesang mas Kaibig-ibig</h2>
            <p class="mt-4 text-3xl text-cream">
                Nabigla si Prinsesa Leonora nang makita si Don Juan. Nabighani naman ang prinsipe sa prinsesa dahil sa labis nitong kagandahan.
Minamadaling paalisin ng prinsesa si Don Juan dahil hindi magtatagal ay maaari nang dumating ang serpyente. Nagmakaawa si Don Juan kay
Prinsesa Leonora na siya ay kupkupin sapagkat tunay na nabihag niya ang puso ng prinsipe.
Nawala na sa isip ni Don Juan na nag-iintay sa labas ng palasyo si Donya Juana. Dahil matatamis na pananalita ni Don Juan ay lumambot ang
puso ni Prinsesa Leonora at pinapanhik ito sa loob ng palasyo.
Isinalaysay ni Don Juan ang mga naging pagdurusa bago marating ang lugar na iyon. Nangako ng tapat na pag-ibig si Don Juan sa prinsesa
bagama’t may pangamba ang prinsesa na pagtataksilan ito.
Ilang sandali pa ay nakaramdam sila ng pagyanig sa buong paligid.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter21">
            <h2 class="text-3xl font-bold text-gold">Kabanata 21: Ang Serpyenteng may Pitong Ulo</h2>
            <p class="mt-4 text-3xl text-cream">
                Kasabay ng malakas na pagyanig ay ang gumagapang na ahas paakyat sa hagdanan. Katulad ng pagharap sa higante ay matapang niya ring
hinarap ang serpyente na may pitong ulo.
Tinagpas niya ang ulo nito ngunit muli itong tumubo at nabuhay. Nakaramdam man ng pagod ay hindi nakalimutan ng prinsipe ang
manalangin. Muling nanumbalik ang lakas nito at mas naging matapang.
Tumagal ng tatlong oras ang laban ng dalawa hanggang sa tuluyang napagod ang serpyente. Inihagis ni Prinsesa Leonora ang balsamo kay
Don Juan upang mapaglagyan ng bawat ulo na matatagpas. Nang makuha ni Don Juan ang pinakahuling ulo ay hindi na muling tumubo at
nagkabuhay.
Naiakyat sa itaas ng balon ang magkapatid. Nalaman ni Don Pedro ang ginawang pagliligtas ni Don Juan sa dalawang prinsesa dahilan kung
bakit ito mas lalong nainggit sa kapatid lalo pa’t nabighani ito sa kagandahan ni Prinsesa Leonora.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter22">
            <h2 class="text-3xl font-bold text-gold">Kabanata 22: Ang Panibagong Panlilinlang</h2>
            <p class="mt-4 text-3xl text-cream">
                Nang umalis ay naiwan ni Prinsesa Leonora ang singsing na diyamante na pinamana pa ng kaniyang ina. Tanging ang kanyang lobo lamang ang
naisama.Dahil sa ginawang pagtataksil ng kapatid ay nahimatay si Prinsesa Leonora. Nagkaroon muli ng malay ang prinsesa habang nasa bisig
ni Don Pedro. Ipinangako ni Don Pedro na gagawin niyang reyna ng Berbanya si Prinsesa Leonora.
Pinakawalan ng prinsesa ang alagang lobo at inutusang iligtas si Don Juan. Umuwi si Don Pedro at Don Diego kasama ang dalawang prinsesa.
Sinabi ni Don Pedro na hindi nila natagpuan si Don Juan sa halip ay iniligtas nila ang dalawang prinsesa sa kamay ng higante at ng serpyente.
Iniutos ng hari na maikasal agad ang apat ngunit tumanggi si Prinsesa Leonora sa hari at nakiusap na ipakasal ito pagkaraan ng pitong taon
dahil siya ay may panata.
Pumayag ang hari na sina Don Diego at Donya Juana muna ang ipakasal. Nagkaroon ng siyam na araw na pagdiriwang sa kaharian.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter23">
            <h2 class="text-3xl font-bold text-gold">Kabanata 23: Ang Lobong Engkantada</h2>
            <p class="mt-4 text-3xl text-cream">
                Naabutan ng lobo si Don Juan na duguan at lamog ang katawan. Dali-dali itong kumuha ng tatlong bote at nagtungo sa Ilog ng Jordan.
Nalinlang ng lobo ang mahigpit na tagapagbantay sa ilog at nilagyan ng tubig ang tatlong bote. Nang matuklasan ng tagapagbantay ang
ginawa ng lobo ay hinabol ito ngunit agad itong tumalon sa bangin ng isang burol.
Nang makabalik sa kinaroroonan ni Don Juan ay ipinahid ng lobo ang tubig sa buong katawan ng prinsipe. Muling nanumbalik ang lakas ng
prinsipe at nawala ang mga sugat nito. Niyakap ni Don Juan ang lobo dahil sa labis na tuwa at pasasalamat.
Nagtungo sina Don Juan at ang lobo sa palasyo upang kuhanin ang naiwang singsing ni Prinsesa Leonora. Nang makuha ang singsing ay
tinulungan ng lobo si Don Juan na makaahon mula sa ilalim ng balon.
Pagkatapos ay tuluyan nang nagpaalam at iniwan ng lobo ang prinsipe. Malapit na sana itong makarating sa kaharian ng Berbanya ngunit ito
ay nakaramdam na ng pagod. Natagpuan niya ang isang punongkahoy na mayabong at dun nagpahinga.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter24">
            <h2 class="text-3xl font-bold text-gold">Kabanata 24: Ang Muling Pagkikita ng Ibong Adarna at ni Don Juan</h2>
            <p class="mt-4 text-3xl text-cream">
                Nagising si Don Juan dahil sa awit ng Ibong Adarna. Nang magising ay laking tuwa ng prinsipe nang makita niya ang ibon na nakadapo sa
sanga.
Muling nagsalaysay ang ibon kay Don Juan sa pamamagitan ng awit nito. Natuklasan ng prinsipe na kaya umalis ang ibon ay dahil gusto nitong
iligtas ang prinsipe sa isang pasakit.
Balak na patayin nina Don Pedro at Don Diego ang ibon at si Don Juan. Inutusan ng Ibong Adarna na maglakbay si Don Juan sa napakalayo
ngunit magandang reyno.
Ito ay matatagpuan sa dakong silangan. Ayon dito, sa lugar na iyon ay matatagpuan niya ang tatlong magkakapatid na prinsesa na sina Isabel,
Juana, at Maria Blanca. Ang kanilang ama ay si Haring Salermo, isang hari na ubod ng tuso at talino. Bilin ng ibon na si Maria Blanca ang piliin
sa tatlo dahil walang kaparis ang kagandahan nito.
Pumayag ang prinsipe sa utos ng ibon at agad naglakbay patungo Reyno delos Cristales. Sa kabilang banda, puno parin ng pag-aalala si
Prinsesa Leonora dahil sa pagkabahala na baka hindi nailigtas ng lobo ang kaniyang mahal na si Don Juan.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter26">
            <h2 class="text-3xl font-bold text-gold">Kabanata 25: Ang Bagong Mundo</h2>
            <p class="mt-4 text-3xl text-cream">
                Sa loob ng tatlong taon na paglalakbay ni Don Juan sa parang at mga gubat ay imbes na mapalapit ito sa Reyno delos Cristales ay mas lalo
lang napalayo at naligaw.
May natagpuan siyang isang matanda at dahil sa gutom ay humingi ito dito ng limos. Binigyan ng matanda si Don Juan ng durog at bukbukin
na sa itim na tinapay.
Dahil sa labis na gutom ay hindi na ito alintana ni Don Juan. Ngunit sa kaniyang pagtataka ay napakalinamnam ng tinapay nang ito ay
kaniyang kainin. Binigyan din siya ng matanda ng pulot-pukyutan at inabutan ng inumin sa bumbong. Muling nagtaka si Don Juan dahil sa
kabila ng pag-inom nito ay pansing hindi nababawasan ang tubig mula sa bumbong.
Muling bumalik ang lakas at sigla ni Don Juan. Nalaman din ng matanda ang pakay ng prinsipe na hanapin at puntahan ang Reyno delos
Cristales. Nagulat ito dahil sa isang daang taong paninirahan nito doon ay hindi niya alam ang daan patungo sa Reyno. Sa halip ay ibinilin nito
na pumunta ang prinsipe sa ikapitong bundok upang hanapin ang isang ermitanyo.
Nagbigay din ang matanda ng kapirasong baro upang marapatin siyang paglingkuran ng ermitanyo. Bilin din nito na sabihin na ang kapirasong
baro ay galing sa isang matandang sugatan.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter26">
            <h2 class="text-3xl font-bold text-gold">Kabanata 26: Ang Panangis ni Prinsesa Leonora</h2>
            <p class="mt-4 text-3xl text-cream">
                Habang si Don Juan ay patuloy sa paglalakbay, si Prinsesa Leonora naman ay patuloy din sa pagtangis.
Sa tuwing nalalaman niyang hindi si Don Juan ang dumadalaw sa kanya kundi si Don Pedro ay hindi nito pinagbubuksan ng pinto. Ang
pangalan pa rin ni Don Juan ang laging sambit ng prinsesa.
Nagbanta naman si Don Pedro na may mangyayaring masama kung siya ay mabibigo sa pag-ibig niya kay Prinsesa Leonora. Hiniling ni Don
Pedro sa prinsesa na limutin na nito si Don Juan dahil ito ay hindi na muling magbabalik sapagkat patay na.
Gayunpaman, tanging si Don Juan lang ang nasa puso’t-isip ng dalaga. Sa kabila ng tatlong taong pag-iintay at pagtitiis ay hindi nito
magawang pakasalan si Don Pedro.
Sa kabilang banda, nagpatuloy sa paglalakbay si Don Juan. Inabot pa siya ng limang buwan na paglalakbay. Pitong bundok ang kaniyang
binagtas bago tuluyang makarating sa dampa ng ermitanyo.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter27">
            <h2 class="text-3xl font-bold text-gold">Kabanata 27: Ang Ikapitong Bundok </h2>
            <p class="mt-4 text-3xl text-cream">
                Sa ikapitong bundok ay nasilayan ni Don Juan ang ermitanyo na hanggang baywang ang balbas. Ibinigay ng Don sa ermitanyo ang kapiraso ng
baro na noo’y binigay ng matanda na nagpalimos ng pagkain at inumin sa kaniya.
Nalaman ng ermitanyo ang pakay ni Don Juan ngunit sa loob ng limang daang taon na paninirahan ay hindi nito nababatid ang Reyno delos
Cristales.
Pinatugtog nito ang kampana sa kaniyang pinto hudyat ng pagdating ng mga hayop sa Armenya ngunit wala ni isa sa kanila ang nakakaalam sa
reyno. Ibinigay ng ermitanyo ang kapiraso ng baro kay Don Juan at inutusan ang olikornyo na ihatid ang prinsipe sa bahay ng kapatid nito na
kapwa ermitanyo.
Nang makarating ay nakita niya ang ermitanyo na sayad hanggang lupa ang balbas. Muling ibinigay ni Don Juan ang kapiraso ng baro na
siyang binigay ng naunang ermitanyo. Nalaman din ng ermitanyo ang pakay ni Don Juan ngunit sa loob ng walong daang taon na paninirahan
nito ay hindi din niya batid ang kahariang hinahanap ni Don Juan.
Pinatugtog niya ang kampana na nasa pintuan at nagsidatingan ang laksa-laksang ibon. Ngunit wala sa mga ito ang nakakaalam sa
kinaroroonan ng kaharian.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter28">
            <h2 class="text-3xl font-bold text-gold">Kabanata 28: Ang Higanteng Agila</h2>
            <p class="mt-4 text-3xl text-cream">
                Huling dumating ang higanteng agila na tila pagod na pagod. Nagalit ang ermitanyo dahil mahigpit na bilin nito na sa oras na marinig ang
tunog ng kampana ay kailangan makauwi agad ang mga ibon.
Humingi ito ng paumanhin at nagpaliwanag na siya ay galing pa sa napakalayong lugar. Bagama’t napakabilis nang kaniyang paglipad ay
nahuli pa rin ito sa pagdating dahil sa kalayuan. Ang higanteng agila ay nagmula pa sa kaharian ng Reyno delos Cristales.
Isinalaysay ng agila kung gaano kaganda at kasagana ang lugar na nais puntahan ni Don Juan. Nagalak naman ang prinsipe dahil sa wakas ay
mararating na niya ang kahariang matagal na niyang hinahanap.
Ipinag-utos ng ermitanyo na ihatid ng agila si Don Juan sa kaharian. Ayon sa agila ay aabutin ng isang buwang paglipad bago marating ang
banyo ni Maria Blanca. Ipinasama na rin ng ermitanyo ang iba pang ibon upang dalhin ang mga gamit at pagkain ni Don Juan at ng agila sa
paglalakbay. Sumakay si Don Juan sa likod ng higanteng agila at nagsimulang lumipad ng mataas.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter29">
            <h2 class="text-3xl font-bold text-gold">Kabanata 29: Ang Reyno Delos Cristales</h2>
            <p class="mt-4 text-3xl text-cream">
                Gaya ng inasahan, nakarating ang agila at si Don Juan sa banyo ni Maria Blanca pagkatapos ng isang buwang paglipad. Hindi tumigil sa
paglipad ang agila at naubos na din ang kanilang baon na pagkain.
Nang makarating sa banyong paliguan ni Maria Blanca ay bumaba si Don Juan mula sa likod ng higanteng agila. Ito ay nagkubli sa likod ng
halamanan.
Ganap na alas-kwatro ng madaling araw ay dadating ang dalaga kasama ang kaniyang dalawang kapatid upang maligo. Malalaman niya kung
sino sa tatlo si Maria Blanca dahil natatangi ang kaniyang ganda.
Nagbilin din ang higanteng agila na magtago at hintayin ang pagdapo ng tatlong kalapati sa puno ng peras. Naiwan si Don Juan at naghintay.
Sumapit ang alas-kwatro ng madaling araw at dumapo ang tatlong kalapati sa puno ng peras. Nakita ng prinsipe si Maria Blanca at nabihag
ang puso nito. Mas lalong nahaling ito nang maghubad ng damit si ang dalaga.
Lumusong si Maria Blanca sa tubig at naligo. Nang magkaroon ng pagkakataon ay kinuha ni Don Juan ang mga damit ng dalaga at
pinaghahalikan ito.
Nabigla ang prinsesa nang makitang wala na doon ang kaniyang mga damit at nagbanta na papatayin ang sinumang kumuha ng mga ito.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter30">
            <h2 class="text-3xl font-bold text-gold">Kabanata 30: Ang Prinsesang si Maria Blanca</h2>
            <p class="mt-4 text-3xl text-cream">
                Natapos nang maligo ang magkakapatid at naiwang mag-isa si Maria Blanca sa paliguan. Nagalit ito nang mapansin niyang wala na ang
kaniyang damit.
Lumapit si Don Juan sa prinsesa at humingi ng tawad. Inihanda niya ang sarili para sa kaparusahan na ibibigay sa kaniya ni Maria Blanca.
Napawi naman ang galit ng dalaga nang makita ang maamong mukha ng prinsipe. Maging ito ay nabihag na din dahil sa kakisigang taglay ng
binata. Nagpakilala ito bilang bunsong anak ni Don Fernando na nagmula sa kaharian ng Berbanya.
Binalaan ni Maria Blanca si Don Juan na tuso at matalino ang kaniyang ama na si Haring Salermo. Ang mga nagtangkang umibig sa prinsesa ay
naging batong palamuti sa hardin ng palasyo.
Alam ni Don Juan na dadaan siya sa matinding pagsubok ni Haring Salermo. Kailangan sundin ng prinsipe ang bawat pag-uutos ng hari.
Habang sa gabi naman ay magkikita sila ni Maria Blanca upang ipaalam dito ang unang pagsubok na kakaharapin.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter31">
            <h2 class="text-3xl font-bold text-gold">Kabanata 31: Ang Ika-Unang Pagsubok ng Hari</h2>
            <p class="mt-4 text-3xl text-cream">
                Kinabukasan ay nagkita si Don Juan at Haring Salermo sa hardin. Pinapatuloy ng hari sa loob ng palasyo si Don Juan ngunit ito ay tumanggi sa
halip ay naghintay nang ipag-uutos ng hari.
Nag-utos ang hari sa kaniyang tauhan na kumuha ng isang salop ng trigong kakaani palang at ibinigay iyon kay Don Juan upang itanim.
Tuwang-tuwa ang hari dahil ang pag-aakala niya ay may mabibiktima na naman siya.
Si Don Juan naman ay umuwi ng malungkot dahil batid niyang malabong mangyari na tumubo agad ang trigo at makapaghanda ng tinapay
para sa hari kinabukasan. Pinawi ng prinsesa ang pag-aalala ng prinsipe. Sinabihan ito ng dalaga na magpahinga at matulog nalang dahil siya
na ang bahala. Ginamit nito ang mahika blangka para tupadin ang utos ng hari.
Sa kalaliman ng gabi ay isinabog ni Maria Blanca ang trigo at agad din itong namunga. Pagkatapos ay inani niya ang mga bunga at dinala ito sa
lutuan ng tinapay. Bago muling sumikat ang araw ay namasa na ng mga Intsik na tagapaggawa ng tinapay ang mga trigong inani.
Namangha ang hari dahil siya ay hinainan ng tinapay na may iba’t-ibang kulay at hugis mula sa isang supot ng trigo lamang.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter32">
            <h2 class="text-3xl font-bold text-gold">Kabanata 32:  Ang Ikalawang Utos ng Hari </h2>
            <p class="mt-4 text-3xl text-cream">
                Nagkita si Don Juan at Haring Salermo para sa ikalawang pagsubok.Habang nasa hardin ay may inilabas ang hari na isang prasko na may
lamang labindalawang negrito at pinakawalan ito sa karagatan. Utos ng hari na hulihin ang lahat ng iyon at muling isilid sa prasko. Nais ng hari
na makita iyon kinaumagahan upang makaligtas sa kaparusahang kamatayan.
Malungkot na nakipagkita si Don Juan kay Maria Blanca dahil sa pangambang hindi niya makumpleto ang labindalawang negrito dahil sa
lawak ng karagatan. Pinayapa ni Maria Blanca si Don Juan at inutusang kumuha ng ilaw. Nang sumapit ang ikaapat ng madaling araw ay
nagtungo ang dalawa sa tabing dagat. Ginamit ng prinsesa ang kaniyang mahika at inutusan ang mga negrito na bumalik sa prasko kung ayaw
nilang matikman ang kaniyang galit.
Kinaumagahan ay nakita ng hari ang prasko at ang labindalawang negrito sa loob nito. Nagalit ang hari dahil hindi niya magawang kitilin si
Don Juan katulad ng ginawa niya sa ibang mga nagtangkang manligaw sa kaniyang anak. Umisip ito ng mas mabigat na pagsubok.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter33">
            <h2 class="text-3xl font-bold text-gold">Kabanata 33: Ang Paglipat sa Bundok</h2>
            <p class="mt-4 text-3xl text-cream">
                Muling nagkita si Don Juan at Haring Salermo sa hardin para sa susunod na pagsubok. Nais ng hari na itapat ang bundok sa harap ng kanyang
durungawan upang pumasok sa palasyo ang sariwang hangin. Bilin ng hari na mailipat ito bago pa man sumikat ang araw.
Nakipagkita muli si Don Juan kay Maria Blanca at kita sa mukha nito ang pangamba. Muling pinayapa ng prinsesa ang prinsipe at sinabing siya
na ang gagawa noon.Nang sumapit ang madaling araw ay tumungo si Maria Blanca sa bundok habang si Don Juan naman ay namamahinga.
Pinalakad ng dalaga ang bundok sa Palacio Real gamit ang malakas na hangin.
Pagsapit ng umaga, nabigla ang hari nang makita niya ang bundok sa tapat ng kaniyang durungawan.
Hindi makapaniwala ang hari na muling malalagpasan ni Don Juan ang kaniyang pagsubok.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter34">
            <h2 class="text-3xl font-bold text-gold">Kabanata 34: Ang Paggawa ng Kastilyo</h2>
            <p class="mt-4 text-3xl text-cream">
                Sa susunod na pagkikita ay iniutos ng hari kay Don Juan na itakip ang bundok sa gitna ng karagatan at tayuan ito ng kastilyo.
Kinakailangan na lagyan ng gulod at kanyon ang gagawing kaharian. Ibinigay din sa kaniya ang mga gagamiting materyales katulad ng palataw
at bareta, piko, kalaykay, maso at kutsara. Sa pagsubok na ito masusukat ng hari ang katalinuhang taglay ni Don Juan.
Katulad ng mga nakaaran, nagkita muli sina Don Juan at Maria Blanca. Sa halip na mag-alala ay pinayuhan ni Maria Blanca na magpahinga
nalang si Don Juan at sya na lamang ang gagawa ng utos ng hari. Katulad ng inutos ng hari, pinaandar ng dalaga ang bundok at itinabon ito sa
karagatan na siyang naging muog.
Ikalima ng hapon nang ipag-utos ng hari na tanggalin na ang kastilyo sa gitna ng karagatan. Sa pamamagitan ng kapangyarihan ni Maria
Blanca ay nawala ang kastilyo at muling bumalik ang lahat sa dati nitong anyo.Natupad na naman ni Don Juan ang pagsubok ng hari.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter35">
            <h2 class="text-3xl font-bold text-gold">Kabanata 35: Ang Nawawalang Singsing</h2>
            <p class="mt-4 text-3xl text-cream">
                Ipinatawag ni Haring Salermo si Don Juan at sinabi dito na nahulog ang diyamante niyang singsing. Nais ng hari na hanapin ni Don Juan ang
singsing sa gitna ng dagat at matagpuan ito sa ilalim ng unan ng hari. Ikasiyam ng gabi nang magkita sina Don Juan at Maria Blanca sa
banyong paliguan. Nagtungo ang dalawa sa dagat.
Inutusan ng dalaga si Don Juan na tadtarin ito ng pinung-pino at ihagis sa tubig. Nagbilin siya na huwag hahayaang may matapon ni
kapirasong laman at huwag matutulog si Don Juan habang nag-iintay. Lilitaw ang kamay ng prinsesa kasama ang singsing at kailangan iyon
kuhanin ni Don Juan.
Sinunod ng prinsipe ang lahat ng pinag-utos ni Maria Blanca. Naging isda ang prinsesa at sumisid sa dagat. Sa tagal nang pag-iintay ay
nakatulog naman ang prinsipe. Ilang beses nang lumitaw ang kamay ng prinsesa at ang singsing ngunit hindi ito nakuha ni Don Juan. Umahon
si Maria Blanca at nagalit kay Don Juan ngunit hindi rin ito nagawang tiisin ng dalaga.
Sa ikalawang pagkakataon ay tinadtad muli ang prinsesa at inihagis sa karagatan subalit sa hindi inaasahan ay tumalsik ang isang bahagi ng
daliri ng prinsesa. Lumitaw ang kamay nito na may hawak na singsing ngunit wala ang hintuturo nito.Nagbilin si Maria Blanca na gawing
palatandaan sa kanya ang kamay na kulang ng isang daliri. Namangha ang hari nang matagpuan niya ang singsing sa ilalim ng kaniyang unan
kinabukasan.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter36">
            <h2 class="text-3xl font-bold text-gold">Kabanata 36: Ang Pag-Amo sa Kabayo</h2>
            <p class="mt-4 text-3xl text-cream">
                Sa muling pagkakataon ay ipinatawag ni Haring Salermo si Don Juan. Inutusan niya itong paamuhin ang isang kabayong mailap at malupit.
Tinuruan ni Maria Blanca si Don Juan sa mga pamamaraan kung paano mapaamo dahil batid niyang ang kabayo na iyon ay ang kaniyang ama.
Bilin ng dalaga na dagukan at paluin ito kung umalma. Nagawa ni Don Juan ang mga bilin ni Maria Blanca kung kaya’t napagtagumpayan
nitong mapaamo ang kabayo.Nagkitang muli ang dalawa ng gabing iyon at natitiyak ni Maria Clara na ipapatawag ng hari si Don Juan.
Nakaratay na ang hari at nagwakas na din ang panganib kaya maaari nang makapasok ng palasyo si Don Juan.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter37">
            <h2 class="text-3xl font-bold text-gold">Kabanata 37: Ang Pagpili sa mga Prinsesa</h2>
            <p class="mt-4 text-3xl text-cream">
                Kinabukasan ay ipinatawag ng hari si Don Juan. Nang makapasok sa palasyo ay napansin ng binata na ang lahat ay nakangiti maging ang
tusong hari.Labis na nagtataka ang prinsipe dahil kahit nakaratay na si Haring Salermo ay bakas sa mukha niya ang saya.
Masayang ibinalita ng hari na iyon na ang panahon upang ipagkaloob sa kaniya ang gantimpalang nararapat sa kaniya. Dinala siya sa tatlong
silid kung saan may butas ang bawat pintuan at tanging ang hintuturo lang ng mga prinsesa ang nakalitaw. Nilaktawan niya ang una at
pangalawang silid at dumaretso sa ikahuling silid. Pinili niya ang huling silid dahil sa palatandaan nitong putol na hintuturo ni Maria Blanca.
Hindi sukat akalain ng hari na mapipili ni Don Juan ang bunsong anak na si Maria Blanca. Walang nagawa si Haring Salermo kundi pasamahin
ang anak kay Don Juan ngunit ito ay nakaisip ng bagong plano.May kautusan ang nagsasabing ipapadala si Don Juan sa Inglatera upang
mapangasawa ang bunsong kapatid ng hari. Nagbanta ang hari kay Don Juan ng kaparusahang kamatayan kung hindi ito susunod sa kautusan.
Nalaman ni Maria Blanca ang plano ng ama kaya nagpasya ang dalawa na tumakas.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter38">
            <h2 class="text-3xl font-bold text-gold">Kabanata 38: Ang Pagtakas sa Reyno Delos Cristales</h2>
            <p class="mt-4 text-3xl text-cream">
                Sa pagtakas ay inutusan ni Maria Blanca si Don Juan na kuhanin ang kabayo na nasa ikapitong pinto ngunit nagkamali ang prinsipe sa pagkuha
at nakuha ang kabayo sa ikawalong pinto.
Wala na silang oras magsisihan dahil kailangan na agad nilang makatakas. Tila isang ipu-ipo sa tulin ang nangyaring habulan sa pagitan ni
Haring Salermo at ng magkasintahan.
Upang hindi maabutan ay naghulog ng mga karayom ang prinsesa na agad naging bakal na tinik sa pamamagitan ng kaniyang mahika.
Inabot ng dalawang araw ang hari bago tuluyang mahawi ang mga bakal na tinik. Inilaglag din ng prinsesa ang kaniyang sabon upang maging
bundok ang patag na daan. Malapit na sanang maabutan ng hari ang dalawa dahil humanap ito ng ibang daan ngunit ginamit muli ng prinsesa
ang kaniyang kapangyarihan.
Inilaglag ng prinsesa ang kohe na kaniyang dala at naging isang karagatan ang dating tuyot na lupa. Hindi na naabutan ng hari ang dalawa
ngunit isinumpa naman niya ang kaniyang anak na makakalimot at magtataksil sa kaniya si Don Juan sa oras na makabalik ito sa kaharian ng
Berbanya. Dahil sa sama ng loob ay nagkasakit si Haring Salermo at namatay. Nakarating naman ang magkasintahan sa Berbanya pagkatapos
ng mahabang paglalakbay.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter39">
            <h2 class="text-3xl font-bold text-gold">Kabanata 39: Ang Sumpaan</h2>
            <p class="mt-4 text-3xl text-cream">
                Nang makarating sa palasyo ay nagpaalam si Don Juan kay Maria Blanca na iiwan muna ito sa isang nayon habang siya ay mauuna nang
pumasok sa palasyo upang makapaghanda ng isang magarbong pagsalubong para sa prinsesa.
Sa una ay tutol ang dalaga ngunit wala din itong nagawa. Mahigpit na nagbilin si Maria Blanca kay Don Juan na huwag titingin o lalapit man
lang sa kung sinumang babae sa palasyo.
Nangako ang prinsipe na hindi ito makakalimot sa ginawang sumpaan. Hiningi ni Don Juan ang bendisyun ng ama at malugod na tinanggap ni
Haring Fernando ang anak.
Sa ga oras na iyon ay naroon din si Prinsesa Leonora. Nagtapat ito sa prinsipe na pitong taon na siyang naghihintay sa muling pagbabalik nito.
Sa isang iglap ay biglang nakalimot si Don Juan sa binitiwang pangako kay Maria Blanca nang makita si Prinsesa Leonora. Natuklasan din ng
hari ang ginawang pagtataksil ni Don Pedro sa kapatid.
Dahil dito ay hinayaan ng hari na pumili si Prinsesa Leonora ng kaniyang papakasalan sa pagitan nina Don Juan at Don Pedro.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter40">
            <h2 class="text-3xl font-bold text-gold">Kabanata 40: Ang Paglimot sa Sumpaan</h2>
            <p class="mt-4 text-3xl text-cream">
                Nagtakda ang hari na maikasal sina Don Juan at Prinsesa Leonora sa linggo ding iyon. Si Don Pedro ay dapat sana’y itatakwil ng hari ngunit
nakiusap si Prinsesa Leonora na gawin nalang ito pagkatapos ng gaganaping kasal.
Nagdiwang ang buong kaharian sa nalalapit na pag-iisang dibdib ng dalawa habang tatlong araw na ang nakakalipas ay hindi parin bumabalik
si Don Juan kay Maria Blanca.
Natuklasan ni Maria Blanca ang pagtataksil ni Don Juan. Habang siya ay nagdurusa si Don Juan naman ay nagsasaya sa piling ni Prinses
Leonora.
Naghanda si Maria Blanca ng gagawing paghihiganti sa araw ng kasal ng dalawa. Nagkaroon siya ng karosang ginto gamit ang kaniyang
mahika at nagpanggap ito bilang emperatris upang makadalo sa kasal.Ang karosang ginto na may labindalawang kabayo ang siyang
maghahatid dito sa kaharian ng Berbanya.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter41">
            <h2 class="text-3xl font-bold text-gold">Kabanata 41: Ang Pagbawi kay Don Juan</h2>
            <p class="mt-4 text-3xl text-cream">
                Sinalubong ng tugtugan ang pagdating ni Maria Blanca na nagpapanggap bilang emperatris. Panandaliang hininto ang kasal upang parangalan
ang pagdating ng mahalagang bisita.
Labis na pighati ang nararamdaman ni Maria Blanca dahil nasisilayan niya si Don Juan na nakatuon ang pansin kay Prinsesa Leonora.
Ipinaalam ni Maria Blanca ang pakay niya sa pagdalo ng kasal na iyon.
Aniya may hinanda siyang laro na nais ipakita bilang handog sa ikakasal. Humiling siya ng prasko na may lamang tubig sa kaniyang
diyamanteng singsing.
Biglang may sumulpot na prasko na may nakalagay na dalawang maliliit na ita.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter42">
            <h2 class="text-3xl font-bold text-gold">Kabanata 42: Ang Dula-Dulaan</h2>
            <p class="mt-4 text-3xl text-cream">
                Ang dalawang ita sa prasko ay mag-asawa. HInahampas ng negrita ang negrito gamit ang pamalo sa tuwing hindi nito naaalala ang mga
pangyayari.
Sa pamamagitan ng dula ay isinasalaysay nito ang mga pagsubok na ibinigay ni Haring Salermo.
Mula sa pagpapatanim ng trigo at paggawa ng tinapay gamit ang bunga nito, paglipat ng bundok sa tapat ng durungawan ng Palacio Real,
pagtatayo ng kastilyo, ang paghahanap sa nawawalng singsing ng hari, ang pagpapaamo sa kabayo, at ang pagpili sa tatlong prinsesa.
Pinapalo ng negrita ang negrito ngunit si Don Juan ang nasasaktan.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter43">
            <h2 class="text-3xl font-bold text-gold">Kabanata 43: Ang Pagpaparusa kay Don Juan</h2>
            <p class="mt-4 text-3xl text-cream">
                Sa kabila ng pagpapalabas ng dula ay hindi pa rin makaalala si Don Juan sa halip ay mas lalo pa itong nawili kay Prinsesa Leonora.
Ipinagpatuloy ng dalawang ita ang dula at isinalaysay nito ang pagtakas noon ng dalawa kay Haring Salermo. Upang di maabutan ng hari ay
ginamit ni Maria Blanca ang kapangyarihan ng diyamanteng singsing.
Isinalaysay din nito ang mga pangyayari nang sila ay makabalik na sa kaharian ng Berbanya. Wala pa ring maalala ang negrito kaya patuloy
itong pinaghahampas ng negrita.
Nasasaktan si Don Juan ngunit binabalewala lang niya ito dahil sa Prinsesa Leonora ang nananatili sa puso ng prinsipe.
Naiyak si Maria Blanca dahil batid nitong tuluyan ng nakalimot si Don Juan. Kinuha ni Maria Blanca ang prasko at babasagin na niya ito upang
gunawin ang buong reyno.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter44">
            <h2 class="text-3xl font-bold text-gold">Kabanata 44: Ang Pagbabalik ng Alaala ni Don Juan</h2>
            <p class="mt-4 text-3xl text-cream">
                Sa isang iglap ay biglang nagbalik ang lahat ng alaala ng prinsipe. Agad itong humingi ng tawad kay Maria Blanca at nangakong hindi na muli
ito magtataksil.
Noon din ay nalaman ni Don Fernando ang lahat ng totoong pangyayari. Naguguluhan ang hari kung ano ang nararapat na gawin lalo na kung
kanino dapat ipakasal si Don Juan.
Humingi ito ng tulong sa Arsobispo. Ayon sa Arsobispo, higit na may karapatan kay Don Juan ang nauna. Labis na nagdamdam si Maria Blanca
at nagalit kaya binuksan nito ang prasko at ibinuhos ang lamang tubig dahilan kung bakit bumaha sa palasyo. Nakiusap si Don Juan kay Maria
Blanca na pahintuin ang pagbaha at nangakong hindi na muli ito makakalimot.
Nakiusap din siya sa kaniyang ama at sa Arsobispo na ipakasal ito kay Maria Blanca. Nagtapat si Don Juan kay Prinsesa Leonora na si Maria
Blanca ang totoo niyang iniibig at nakiusap na tanggapin ang pag-ibig na laan ni Don Pedro.
Nang mga oras na iyon ay ninais ni Don Juan na makasal sila ni Maria Blanca.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter45">
            <h2 class="text-3xl font-bold text-gold">Kabanata 45: Ang Masayang Yugto</h2>
            <p class="mt-4 text-3xl text-cream">
                Naging makatuwiran si Haring Fernando at pinili kung ano ang nararapat. Ipinakasal ng hari si Don Juan kay Maria Blanca. Wala namang
nagawa si Prinsesa Leonora kundi tanggapin ang kapasyahan ng hari.
Nais ni Don Fernando na ipamana ang kaharian ng Berbanya kay Don Juan ngunit sinabi ni Maria Blanca na ipagkaloob nalang ito kay Don
Pedro sapagkat pamumunuan ni Don Juan ang Reyno delos Cristales.Binasbasan ng Arsobispo si Don Pedro bilang hari at si Prinsesa Leonora
bilang Reyna ng Berbanya.Pagkatapos ng kasal nina Don Juan at Maria Blanca ay nagpaalam na ang mga ito upang magbalik sa Reyno delos
Cristales.
            </p>
        </div>

        <div class="p-8 shadow-lg chapter bg-light-brown rounded-xl fade-in" id="chapter46">
            <h2 class="text-3xl font-bold text-gold">Kabanata 46: Ang Hari at Reyna ng Reyno Delos Cristales </h2>
            <p class="mt-4 text-3xl text-cream">
                Ipinagtaka ni Don Juan ang mabilis na pagdating nila sa Reyno delos Cristales. Kung ang una niyang paglalakbay ay inabot ng isang buwan
ngayon naman ay nakarating sila sa kaharian sa loob ng isang oras. Matagal-tagal na din mula ng yumao ang amang hari at ang kaniyang mga
kapatid na prinsesa. Nasa pamumuno man ng iba ang kaharian ay nanatili itong mapayapa.
Masayang tinanggap ng mamamayan ng reyno ang pagdating ni Maria Blanca bilang bagong reyna. Ang mga isinumpa ni Haring Salermo ay
nakalaya na.Nagkaroon ng isang malaking piging sa kaharian at nagpahayag si Maria Blanca na si Don Juan na ang bagong hari ng kaharian.
Siyam na araw na nagdiwang ang kaharian. Mas lalo pang umunlad ang Reyno delos Cristales dahil sa magandang pamamalakad ng hari at
reyna.
            </p>
        </div>

        <div class="buttons-container">
            <button id="prev" class="px-6 py-2 rounded-full shadow-lg btn-gradient text-dark btn-position btn-left" >
            Previous
            </button>
            <button id="next" class="px-6 py-2 rounded-full shadow-lg btn-gradient text-dark btn-position btn-right">
            Next
            </button>
        </div>
    </main>



    <footer class="py-6 bg-header-gradient">
        <div class="container mx-auto text-center">
        <p class="text-gold">&copy; 2025 Ibong Adarna.</p>
        </div>
    </footer>

    <script src="{{ asset('js/script.js') }}"> </script>
</body>
</html>
