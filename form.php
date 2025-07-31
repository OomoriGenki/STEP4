<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-waidth, initial-scale=1.0">
    <title>フォーム入力</title>
    <link rel="stylesheet" href="style.css">
<head>
<body>
    <div class="container">
        <h1>フォーム入力</h1>
        <form
         action="confirm.php" method="post">
            <div class="form-group>
                <label for="name">名前:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group>
                <label for="age">年齢:</label>
                <input type="number" id="age" name="age" required>
            </div>
            <div class="form-group">
                <label for="tel">電話番号:</label>
                <input type="tel" id="tel" name="tel" required>
            </div>
            <div class="form-group">
                <label for="email">メールアドレス:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="address">住所:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <div class="form-group">
                <label for="question">質問:</label>
                <inpuut type="text" id="question" name="question">
            </div>
            <div class="from-group">
                <label for=gender>性別:</label>
                <select id="gender" name="gender">
                    <option value="male">男性</option>
                    <option value="female">女性</option>
                    <option value="other">その他</option>
                </select>
            </div>
            <button type="submit" class="submit-button">送信</button>
        </form>
    </div>
</body>
</html>