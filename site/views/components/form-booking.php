

<article>
    <form hx-post="create-booking" hx-trigger="submit" hx-swap="outerHTML">
        <h3>New Booking</h3>
    
        <label>username</label>
        <input name="username" type="text" required>
    
        <label>Court number</label>
        <select name="court_id" required>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
    
        <label>Date</label>
        <input name="date" type="date" required>
    
        <label>Time</label>
        <input name="time" type="time" step="900" value="08:00" required>
    
        <input type="submit" value="create-booking">
    
    </form>
</article>