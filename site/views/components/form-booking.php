<?php global $username; ?>


<article>
    <form hx-post="create-booking" hx-trigger="submit" hx-swap="outerHTML">
        <h3>New Booking</h3>
    
        <input name="username" type="hidden" value="<?= $username ?>">
    
        <label>Court number</label>
        <select name="court" required>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
        </select>
    
        <label>Date</label>
        <input name="date" type="date" required>
    
        <label>Start Time</label>
        <input name="starttime" type="time" step="900" value="08:00" required>

        <label>End Time</label>
        <input name="endtime" type="time" step="900" value="09:00" required>

        <input type="submit" value="create-booking">
    
    </form>
</article>