<form action="process.php" method="post">
    <fieldset>
        <!-- Get user information, with requirnments -->
        <legend>Customer Information</legend>
        <label for="first_name">First name</label>
        <input type="text" id="first_name" name="first_name" required minlength="5" placeholder="Your Name Here" maxlength="30">
        <label for="last_name">Last name</label>
        <input type="text" id="last_name" name="last_name" required minlength="5" placeholder="Your Last Name Here" maxlength="30">
        <label for="phone">Phone number</label>
        <input type="tel" id="phone" name="phone" placeholder="555-123-4567" minlength="10" maxlength="15">
        <label for="email">Email</label>
        <input type="email" id="email" required name="email" minlength="5" placeholder="you@example.com" maxlength="25">
    </fieldset>

    <fieldset>
        <legend>Additional Comments</legend>
        <p>
            <!-- Text are for user comments -->
            <label for="comments">Comments (optional)</label><br>
            <textarea id="comments" name="comments" rows="4"
                placeholder="Allergies, delivery instructions, custom messages..."></textarea>
        </p>
    </fieldset>

    <p>
        <!-- Submit the form -->
        <button type="submit">Place Order</button>
    </p>