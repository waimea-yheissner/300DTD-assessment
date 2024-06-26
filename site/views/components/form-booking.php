

<article>
    <form hx-post="create-booking" hx-trigger="submit" hx-swap="outerHTML">
        <h3>New Booking</h3>
    
        <label>username</label>
        <input name="user" type="text" required>
    
        <label>Court number</label>
        <input name="court_number" type="int" required>
    
        <label>Date</label>
        <input name="user" type="date" required>
    
        <label>Time</label>
        <input name="pass" type="time" required>
    
        <input type="submit" value="create-booking">
    
    </form>
</article>