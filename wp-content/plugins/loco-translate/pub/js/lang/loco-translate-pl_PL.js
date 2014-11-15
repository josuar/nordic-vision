/**
 * Loco js export: JavaScript function
 * Project: loco.js conversion
 * Release: Working copy
 * Locale: pl_PL, Polish
 * Exported at: Wed, 06 Aug 2014 18:03:07 +0100 
 */
loco = window.loco||{}, loco.t = function( pairs ){
    
    // named plural forms
    var pluralForms = ["one","few","many"];
    
    // calc numeric index of a plural form (0-2)
    function pluralIndex( n ){
        return Number( (n==1 ? 0 : n%10 >= 2 && n%10<=4 &&(n%100<10||n%100 >= 20)? 1 : 2) );
    }

    // expose public t() function
    return function( msgid1, msgid2, n ){
        var value = pairs[msgid1];
        // singular if no multiplier
        if( null == n ){
            n = 1;
        }
        // plurals stored as objects, e.g. { one: "" }
        if( value instanceof Object ){
            value = value[ pluralForms[ pluralIndex(n) ] || 'one' ];
        }
        return value || ( 1 === n ? msgid1 : msgid2 ) || msgid1 || '';
    };
}(
    {"Fuzzy":"Niepewny","File system permissions for %s":"Uprawnienia systemu plik\u00f3w dla %s","Back":"Wstecz","Get help":"Pomoc","Package details":"Detale paczki","Translations (PO)":"T\u0142umaczenia (PO)","Template (POT)":"Schemat (POT)","File permissions":"Uprawnienia plik\u00f3w","Extends: %s":"Rozszerza: %s","1 language":{"one":"1 j\u0119zyk","few":"%u j\u0119zyki","many":"%u j\u0119zyk\u00f3w"},"Updated":"Zaktualizowano","OK":"OK","Powered by":"Nap\u0119dzany przez","Loco may not work as expected":"Loco mo\u017ce nie dzia\u0142a\u0107 tak jak oczekujesz","Configure Loco Translate":"Konfiguruj Loco Translate","Compiling MO files":"Kompilowanie plik\u00f3w MO","Use built-in MO compiler.":"U\u017cyj wbudowanego kompilatora MO.","Use external command:":"U\u017cyj zewn\u0119trznej komendy:","Enter path to msgfmt on server":"Wpisz \u015bcie\u017ck\u0119 do msgfmt na serwerze","Generate hash tables":"Generuj tablice hash","Backing up PO files":"Zr\u00f3b kopi\u0119 zapasow\u0105 plik\u00f3w PO","Number of backups to keep of each file:":"Liczba kopii zapasowych ka\u017cdego pliku do przechowania:","Experimental features":"Funkcje eksperymentalne","Enable Wordpress core translations":"W\u0142\u0105cz t\u0142umaczenie silnika Wordpress","Save settings":"Zapisz ustawienia","Template file":"Plik schematu","Switch to...":"Zmie\u0144 na...","never":"nigdy","Save":"Zapisz","Download":"Pobierz","Sync":"Synchronizuj","Revert":"Przywr\u00f3\u0107","Add":"Dodaj","Del":"Usu\u0144","Filter translations":"Filtruj t\u0142umaczenia","Help":"Pomoc","Initialize new translations in %s":"Zainicjuj nowe t\u0142umaczenie w %s","Select from common languages":"Wybierz z cz\u0119stych j\u0119zyk\u00f3w","or enter any language code":"lub wpisz dowolny kod j\u0119zyka","create in <code>%s<\/code>":"stw\u00f3rz w <code>%s<\/code>","create in global languages directory":"stw\u00f3rz w globalny, katalogu j\u0119zyk\u00f3w","Start translating":"Zacznij t\u0142umaczy\u0107","New version available":"Nowa wersja jest dost\u0119pna","Upgrade to version %s of Loco Translate":"Zaktualizuj Loco Translate do wersji %s","Select a plugin or theme to translate":"Wybierz wtyczk\u0119 lub motyw do t\u0142umaczenia","Themes":"Motywy","Plugins":"Wtyczki","Core":"Silnik","%s fuzzy":"%s niepewnych","Failed to compile MO file with built-in compiler":"Niepowodzenie kompilacji pliku MO u\u017cywaj\u0105c wbudowanego kompilatora","File download failed":"B\u0142\u0105d pobierania pliku","Unknown language":"Nieznany j\u0119zyk","Some files not writable":"Niekt\u00f3re pliki s\u0105 tylko do odczytu","Some files missing":"Brakuj\u0105ce niekt\u00f3re pliki","\"%s\" folder not writable":"\"%s\" katalog jest tylko do odczytu","POT file not writable":"Plik POT jest tylko do odczytu","PO file not writable":"Plik PO jest tylko do odczytu","MO file not writable":"Plik MO jest tylko do odczytu","MO file not found":"Nie znaleziono pliku MO","Folder not writable":"Katalog jest tylko do odczytu","Folder not found":"Nie znaleziono katalogu","User does not have permission to manage translations":"U\u017cytkownik nie ma uprawnie\u0144 do zarz\u0105dzania t\u0142umaczeniami","Failed to compile MO file with %s, check your settings":"Nie uda\u0142o si\u0119 skompilowa\u0107 pliku MO u\u017cywaj\u0105c %s, sprawd\u017a ustawienia","Invalid data posted to server":"B\u0142\u0119dne dane wys\u0142ane do serwera","Package not found called %s":"Paczka o nazwie %s nie zosta\u0142a znaleziona","Web server cannot create backups in \"%s\". Fix file permissions or disable backups in settings":"Serwer www nie mo\u017ce utworzy\u0107 kopii w \"%s\". Popraw uprawnienia lub wy\u0142\u0105cz kopie zapasowe w ustawieniach","Web server cannot create \"%s\" directory in \"%s\". Fix file permissions or create it manually.":"Serwer www nie mo\u017ce utworzy\u0107 katalogu \"%s\". Popraw uprawnienia lub utw\u00f3rz go r\u0119cznie.","Web server cannot create files in the \"%s\" directory. Fix file permissions or use the download function.":"Serwer www nie mo\u017ce utworzy\u0107 plik\u00f3w w katalogu \"%s\". Popraw uprawnienia lub u\u017cyj funkcji pobierania.","%s file is not writable by the web server. Fix file permissions or download and copy to \"%s\/%s\".":"%s jest tylko do odczytu dla serwera www. Popraw uprawnienia lub pobierz i skopiuj do \"%s\/%s\".","Cannot create MO file":"Nie mo\u017cna utworzy\u0107 pliku MO","Cannot overwrite MO file":"Nie mo\u017cna nadpisa\u0107 pliku MO","Failed to write MO file":"B\u0142\u0105d zapisu pliku MO","No source files in this package, nothing to sync":"Brak plik\u00f3w \u017ar\u00f3d\u0142owych w tej paczce, nic do synchronizacji","No strings could be extracted from source files":"\u017badne linie nie mog\u0105 by\u0107 wyci\u0105gni\u0119te z plik\u00f3w \u017ar\u00f3d\u0142owych","Unknown error":"Nieznany b\u0142\u0105d","PO file saved":"Plik PO zapisany","and MO file compiled":"oraz plik MO skompilowany","Merged from %s":"Po\u0142\u0105czono z %s","Merged from source code":"Po\u0142\u0105czono z kodu \u017ar\u00f3d\u0142owego","Already up to date with %s":"Ju\u017c aktualne z %s","Already up to date with source code":"Ju\u017c aktualne z kodu \u017ar\u00f3d\u0142owego","1 new string added":{"one":"1 nowa linia dodana","few":"%s nowe linie dodano","many":"%s nowych linii dodano"},"1 obsolete string removed":{"one":"1 zb\u0119dna linia usuni\u0119ta","few":"%s zb\u0119dne linie usuni\u0119te","many":"%s zb\u0119dnych linii usuni\u0119to"},"Your changes will be lost if you continue without saving":"Utracisz aktualne zmiany je\u015bli b\u0119dziesz kontynuowa\u0142 bez zapisywania","Source text":"Tekst \u017ar\u00f3d\u0142owy","%s translation":"%s t\u0142umaczenie","Comments":"Komentarze","Context":"Kontekst","File check":"Sprawdzenie plik\u00f3w","PO file used as template. This will be renamed to %s on first save":"Plik PO u\u017cyty jako szablon. Nazwa zostanie zmieniona na % przy pierwszym zapisie","File cannot be created automatically. Fix the file permissions or use Download instead of Save":"Plik nie mo\u017ce by\u0107 utworzony automatycznie. Napraw uprawnienia albo u\u017cyj Pobierz zamiast Zapisz","%s file is empty":"Plik %s jest pusty","Run Sync to update from source code":"Uruchom synchronizacj\u0119 aby zaktualizowa\u0107 z kodu \u017ar\u00f3d\u0142owego","No strings could be extracted from source code":"Nie mo\u017cna wyci\u0105gn\u0105\u0107 \u017cadnych linii z kodu \u017ar\u00f3d\u0142owego","Run Sync to update from %s":"Uruchom synchronizacj\u0119 aby zaktualizowa\u0107 z %s","Source code has been modified, run Sync to update POT":"Kod \u017ar\u00f3d\u0142owy zosta\u0142 zaktualizowany, uruchom synchronizacj\u0119 aby zaktualizowa\u0107 plik POT","POT has been modified since PO file was saved, run Sync to update":"Plik POT zosta\u0142 zmieniony od czasu zapisu pliku PO, uruchom synchronizacj\u0119 aby zaktualizowa\u0107","Bad file path":"B\u0142\u0119dna \u015bcie\u017cka pliku","Empty or invalid %s file":"Pusty lub b\u0142\u0119dny plik %s","%s file has no header":"Plik %s nie ma nag\u0142\u00f3wka","New template":"Nowy szablon","New language":"Nowy j\u0119zyk","%s%% translated":"%s%% przet\u0142umaczono","1 string":{"one":"1 linia","few":"%s linie","many":"%s linii"},"%s untranslated":"%s nie przet\u0142umaczone","Loco, Translation Management":"Loco, Menad\u017cer T\u0142umacze\u0144","Manage translations":"Zarz\u0105dzaj t\u0142umaczeniami","Translation options":"Opcje t\u0142umacze\u0144","Loco Translate":"Loco Translate","Settings":"Ustawienia","Translation":"T\u0142umaczenie","Packages":"Paczki","Error":"B\u0142\u0105d","Warning":"Ostrze\u017cenie","Permission denied":"Odmowa dost\u0119pu","Settings saved":"Ustawienia zapisane","New PO file":"Nowy plik PO","You must specify a valid locale for a new PO file":"Musisz okre\u015bli\u0107 w\u0142a\u015bciwy region dla nowego pliku PO","No translatable strings found":"Brak dost\u0119pnych lini do t\u0142umaczenia","Cannot create a PO file.":"Nie mo\u017cna utworzy\u0107 pliku PO.","PO file already exists with locale %s":"Plik PO ju\u017c istnieje z regionu %s"} 
);
