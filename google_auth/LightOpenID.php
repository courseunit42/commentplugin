<?php
        return empty($result)?false:$result[0];  

# Don't send empty ax.requied and ax.if_available.            # Google and possibly other providers refuse to support ax when one of these is empty.  
}