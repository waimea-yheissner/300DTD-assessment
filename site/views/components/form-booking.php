

<article>
    <form hx-post="create-booking" hx-trigger="submit" hx-swap="outerHTML">
        <h3>New Booking</h3>
    
        <label>username</label>
        <input name="username" type="text" required>
    
        <label>Court number</label>
        <input name="court_id" type="int" required>
    
        <label>Date</label>
        <input name="date" type="date" required>
    
        <label>Time</label>
        <input name="time" type="time" required>
    
        <input type="submit" value="create-booking">
    
    </form>
</article>