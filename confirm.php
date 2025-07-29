<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>入力内容確認</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>入力内容確認</h1>
        <?php
        $errors = [];

        // 入力値の取得（issetで存在チェックし、null合体演算子で初期値を設定）
        $name = $_POST['name'] ?? '';
        $age = $_POST['age'] ?? '';
        $tel = $_POST['tel'] ?? '';
        $email = $_POST['email'] ?? '';
        $address = $_POST['address'] ?? '';
        $question = $_POST['question'] ?? ''; 
        $gender = $_POST['gender'] ?? '';

        // バリデーション
        // name: ひらがな、カタカナ、漢字、英字のみ
        if (!preg_match('/^[ぁ-んァ-ヶ一-龠A-Za-z\s]+$/u', $name)) {
            $errors['name'] = '名前はひらがな、カタカナ、漢字、英字のみ使用できます。';
        }

        // age: 0から150の間
        if (!filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range"=>0, "max_range"=>150)))) {
            $errors['age'] = '年齢は0から150の間で入力してください。';
        }

        // phone: 半角数字とハイフンのみ
        if (!preg_match('/^[0-9-]+$/', $tel)) {
            $errors['tel'] = '電話番号は半角数字とハイフンのみ使用できます。';
        }

        // email: メールアドレスの形式が正しいか
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'メールアドレスの形式が正しくありません。';
        }

        // address: ひらがな、カタカナ、漢字、英字のみ
        if (!preg_match('/^[ぁ-んァ-ヶ一-龠A-Za-z0-9\s]+$/u', $address)) {
            $errors['address'] = '住所はひらがな、カタカナ、漢字、英字、数字のみ使用できます。';
        }

        // 必須項目チェック (name, age, tel, email, addressはform.phpでrequired)
        if (empty($name)) $errors['name'] = '名前は必須です。';
        if (empty($age)) $errors['age'] = '年齢は必須です。';
        if (empty($tel)) $errors['tel'] = '電話番号は必須です。';
        if (empty($email)) $errors['email'] = 'メールアドレスは必須です。';
        if (empty($address)) $errors['address'] = '住所は必須です。';


        if (!empty($errors)) {
            // エラーがある場合
            echo '<div class="error-messages">';
            echo '<h3>入力エラー:</h3>';
            echo '<ul>';
            foreach ($errors as $error) {
                echo '<li>' . htmlspecialchars($error) . '</li>';
            }
            echo '</ul>';
            echo '<div class="button-group"><button type="button" onclick="history.back()">入力フォームに戻る</button></div>';
            echo '</div>';
        } else {
            // エラーがない場合、入力内容を表示
            echo '<div class="confirmation-details">';
            echo '<p><strong>名前:</strong> ' . htmlspecialchars($name) . '</p>';
            echo '<p><strong>年齢:</strong> ' . htmlspecialchars($age) . '</p>';
            echo '<p><strong>電話番号:</strong> ' . htmlspecialchars($tel) . '</p>';
            echo '<p><strong>メールアドレス:</strong> ' . htmlspecialchars($email) . '</p>';
            echo '<p><strong>住所:</strong> ' . htmlspecialchars($address) . '</p>';
            echo '<p><strong>質問:</strong> ' . htmlspecialchars($question) . '</p>';
            echo '<p><strong>性別:</strong> ' . htmlspecialchars($gender) . '</p>';
            echo '</div>';
            echo '<div class="button-group">';
            echo '<button type="button" onclick="history.back()">戻る</button>';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>