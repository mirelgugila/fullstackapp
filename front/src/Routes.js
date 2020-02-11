import React from "react";
import {
    BrowserRouter as Router,
    Switch,
    Route
} from "react-router-dom";
import Protected from './Protected';
import User from './Components/User/User';

const Routes = () => {
    return (
        <Router>
            <div>
                <Switch>
                    <Route path="/" exact>
                        <Protected WrappedComponent={User} />
                    </Route>
                </Switch>
            </div>
        </Router>
    );
}
export default Routes;