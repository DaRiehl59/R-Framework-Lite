{if isset($message)}
                <div id="confirm">
                    <h1>Confirmation</h1>
                    <p>{$message}</p>
                    <form action="{$previous_url}" method="post">
                        <input type="submit" value="OK">
                    </form>
                </div>
{/if}